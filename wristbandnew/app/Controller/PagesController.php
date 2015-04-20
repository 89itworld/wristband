<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ankur Chauhan
 * Date: 5/2/15
 * Time: 10:58 AM
 * To change this template use File | Settings | File Templates.
 */
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    public $components = array('RequestHandler');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index','display');
    }

    function  index($slug=null)
    {

        $this->layout = "front";
        $this->loadModel("CmsPage");
        $result = $this->CmsPage->find("first", array("conditions" => array("CmsPage.slug" => $slug)));
       // pr($result);
        $this->set("result", $result);

    }
    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     */
    public function display()
    {
         $this->layout = "front";
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            $this->redirect('/');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }

        $this->set(compact('page', 'subpage', 'title_for_layout'));
        $this->render(implode('/', $path));
    }

}
?>
