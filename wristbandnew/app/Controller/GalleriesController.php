<?php

App::uses('AppController', 'Controller');

App::uses('Sanitize', 'Utility');

class GalleriesController extends AppController {

    public $components = array('RequestHandler', 'Paginator', 'FileWrite');

    public function beforeFilter() {

        parent::beforeFilter();

    }

    /*

     *Gallery List

     */

    function bandhead_index() {


        $this -> loadModel('Gallery');

        $conditions = array();

        if (!empty($this -> request -> data)) {

            if ($this -> request -> data['Gallery']['is_active'] != "") {

                $conditions['Gallery.is_active'] = $this -> request -> data['Gallery']['is_active'];

                $this -> request -> params['named']['Gallery.is_active'] = $this -> request -> data['Gallery']['is_active'];

            }

            if ($this -> request -> data['Gallery']['search'] != "") {

                $cond = array();

                $cond['Gallery.name LIKE'] = "%" . trim($this -> request -> data['Gallery']['search']) . "%";

                $cond['Gallery.image LIKE'] = "%" . trim($this -> request -> data['Gallery']['search']) . "%";

                $conditions['OR'] = $cond;

                $this -> request -> params['named']['Gallery.name'] = $this -> request -> data['Gallery']['search'];

            }

            $this -> set('searching', 'searching');

        } else {

            if (isset($this -> request -> params['named']['Gallery.is_active']) && $this -> request -> params['named']['Gallery.is_active'] != "") {

                $conditions['Gallery.is_active'] = $this -> request -> params['named']['Gallery.is_active'];

                $this -> request -> data['Gallery']['is_active'] = $this -> request -> params['named']['Gallery.is_active'];

            }

            if (isset($this -> request -> params['named']['Gallery.search']) && $this -> request -> params['named']['Gallery.search'] != "") {

                $cond = array();

                $cond['Gallery.name LIKE'] = "%" . trim($this -> request -> params['named']['Gallery.search']) . "%";

                $cond['Gallery.image LIKE'] = "%" . trim($this -> request -> params['named']['Gallery.search']) . "%";

                $conditions['OR'] = $cond;

                $this -> request -> data['Gallery']['name'] = $this -> request -> params['named']['Gallery.search'];

            }

        }

        //$this->Gallery->virtualFields['branch'] = 'Branch.name';

        $this -> paginate = array('recursive' => -1, 'limit' => PAGINATION_LIMIT, 'conditions' => $conditions );

        $gallery_data = $this -> paginate('Gallery');

        //pr($gallery_data);

        $this -> set('gallery_data', $gallery_data);

    }

    /*

     *Add new Gallery

     */

    public function bandhead_add() {

        if ($this -> request -> is('post')) {

            $this -> loadModel('Gallery');

            $this -> request -> data = Sanitize::clean($this -> request -> data, array('encode' => false));

            $this -> Gallery -> set($this -> request -> data);

            if ($this -> Gallery -> validates()) {

                $file = $this -> request -> data["Gallery"]["image"];

                if (!empty($file["name"])) {

                    $filename = $this -> FileWrite -> _save_gallery_images($this -> request -> data["Gallery"]['image']);

                    $this -> request -> data["Gallery"]["image"] = $filename;

                    if ($this -> Gallery -> save($this -> request -> data, false)) {

                        $this -> Session -> write('flash', array('Gallery image has been added successfully.', 'success'));

                        $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));

                    } else {

                        $this -> Session -> write('flash', array('Some error occurred to add the Gallery image.', 'failure'));

                        $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));

                    }

                } else {

                    $this -> Session -> write('flash', array('Please provide gallery image.', 'failure'));

                    $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));
                }

            }

        }

    }

    /**

     * Edit a Gallery

     * @param  $gal_img_id

     * @return void

     */

    public function bandhead_edit($gal_img_id) {

        $id = base64_decode($gal_img_id);

        $this -> loadModel('Gallery');

        $gallery = $this -> Gallery -> find('first', array('conditions' => array('Gallery.id' => $id)));

        if (!empty($gallery)) {

            if (!empty($this -> request -> data)) {

                $this -> request -> data = Sanitize::clean($this -> request -> data, array('encode' => false));

                $this -> Gallery -> set($this -> request -> data);

                $file = $this -> request -> data["Gallery"]["image"];
                
                if (!empty($file["name"])) {

                    $filename = $this -> FileWrite -> _save_gallery_images($this -> request -> data["Gallery"]['image']);

                    // Delete previous image link

                    $path1 = WWW_ROOT . DS . GALLERY_LARGE_IMAGE_PATH . $this -> request -> data['Gallery']['old_image'];
                    $path2 = WWW_ROOT . DS . GALLERY_SMALL_IMAGE_PATH . $this -> request -> data['Gallery']['old_image'];

                    $delFile1 = new File($path1, false, 0777);
                    $delFile1 -> delete();
                    
                    $delFile2 = new File($path2, false, 0777);
                    $delFile2 -> delete();
                    
                    $this -> request -> data["Gallery"]["image"] = $filename;

                } else {

                    $this -> request -> data["Gallery"]["image"] = $this -> request -> data["Gallery"]["old_image"];
                    unset($this -> request -> data["Gallery"]["old_image"]);
                    $this -> Gallery -> validator() -> remove('image');

                }

                if ($this -> Gallery -> validates()) {

                    //pr($this->request->data); die;

                    $this -> Gallery -> id = $this -> request -> data["Gallery"]["id"];

                    if ($this -> Gallery -> save($this -> request -> data, false)) {

                        $this -> Session -> write('flash', array('Gallery image has been updated successfully.', 'success'));

                        $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));

                    } else {

                        $this -> Session -> write('flash', array('Some error occured to edit the Gallery image.', 'failure'));

                        $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));

                    }

                }

            }

            $this -> request -> data = $gallery;

        } else {

            $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));

        }

    }

    /**

     * view gallery image

     * @param  $gal_img_id

     * @return void

     */

    public function bandhead_view($gal_img_id) {

        $id = base64_decode($gal_img_id);

        $this -> loadModel('Gallery');

        $gallery_data = $this -> Gallery -> find('first', array('conditions' => array('Gallery.id' => $id), 'recursive' => -1));

        if (!empty($gallery_data)) {

            $this -> set('gallery_data', $gallery_data);

        } else {

            $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));

        }

    }

    /**

     * active gallery image

     * @param string $gal_img_id

     * @return void

     */

    function bandhead_activate($gal_img_id) {

        $id = base64_decode($gal_img_id);

        $gallery_data = $this -> Gallery -> find('first', array('conditions' => array('Gallery.id' => $id), 'recursive' => -1));

        //pr($clipart_data); die;

        if (!empty($gallery_data)) {

            $new_gallery_data['Gallery']['is_active'] = 1;

            $new_gallery_data['Gallery']['id'] = $gallery_data['Gallery']['id'];

            if ($this -> Gallery -> save($new_gallery_data)) {

                $this -> Session -> write('flash', array('Your selected record has been Activated successfully.', 'success'));

                $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));

            } else {

                $this -> Session -> write('flash', array('Some error occured to Activate the record.', 'failure'));

                $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));

            }

        } else {

            $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));

        }

    }

    /**

     * De-active gallery image

     * @param string $gal_img_id

     * @return void

     */

    function bandhead_deactivate($gal_img_id) {

        $id = base64_decode($gal_img_id);

        $gallery_data = $this -> Gallery -> find('first', array('conditions' => array('Gallery.id' => $id), 'recursive' => -1));

        //pr($clipart_data); die;

        if (!empty($gallery_data)) {

            $new_gallery_data['Gallery']['is_active'] = 0;

            $new_gallery_data['Gallery']['id'] = $gallery_data['Gallery']['id'];

            if ($this -> Gallery -> save($new_gallery_data)) {

                $this -> Session -> write('flash', array('Your selected record has been Deactivated successfully.', 'success'));

                $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));

            } else {

                $this -> Session -> write('flash', array('Some error occured to Deactivate the record.', 'failure'));

                $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));

            }

        } else {

            $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));

        }

    }

}
