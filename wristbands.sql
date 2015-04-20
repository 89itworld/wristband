-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2015 at 07:07 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.6-1ubuntu1.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wristbands`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `image`, `is_active`, `is_deleted`, `created`, `modified`) VALUES
(1, 'Dummy', 'IMG55765167.jpg', 1, 0, '2015-02-12 10:31:48', '2015-02-16 05:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `cliparts`
--

CREATE TABLE IF NOT EXISTS `cliparts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `cliparts`
--

INSERT INTO `cliparts` (`id`, `name`, `image`, `is_active`, `is_deleted`) VALUES
(1, 'Badge', 'IMG68163466.png', 1, 0),
(2, 'Anchor', 'IMG39600270.png', 1, 0),
(3, 'Angel', 'IMG26889044.png', 1, 0),
(4, 'Apple', 'IMG85772079.png', 1, 0),
(5, 'Baseball', 'IMG78548332.png', 1, 0),
(6, 'Attention', 'IMG62907568.png', 1, 0),
(7, 'Basketball', 'IMG55189417.png', 1, 0),
(8, 'Bart', 'IMG53371856.png', 1, 0),
(9, 'Bat', 'IMG27752468.png', 1, 0),
(10, 'Bear', 'IMG81096115.png', 1, 0),
(11, 'Beer', 'IMG29831116.png', 1, 0),
(12, 'Bike', 'IMG42641921.png', 1, 0),
(13, 'Birdhead', 'IMG27442126.png', 1, 0),
(14, 'Batman', 'IMG85347653.png', 1, 0),
(15, 'Cowboy', 'IMG70853847.png', 1, 0),
(16, 'Bulldog', 'IMG4243383.png', 1, 0),
(17, 'Crescent', 'IMG8650779.png', 1, 0),
(18, 'Butterfly', 'IMG56890880.png', 1, 0),
(19, 'Cabin', 'IMG59308026.png', 1, 0),
(20, 'Cancer', 'IMG40567341.png', 1, 0),
(21, 'Candy', 'IMG10882720.png', 1, 0),
(22, 'Car', 'IMG80048867.png', 1, 0),
(23, 'Cat', 'IMG94115763.png', 1, 0),
(24, 'Danger', 'IMG83963747.png', 1, 0),
(25, 'Clover', 'IMG14768999.png', 1, 0),
(26, 'Club', 'IMG26606411.png', 1, 0),
(27, 'Cross', 'IMG46126841.png', 1, 0),
(28, 'Cupid', 'IMG71298884.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE IF NOT EXISTS `cms_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `slug`, `keyword`, `description`, `status`, `is_deleted`, `created`, `modified`) VALUES
(1, 'About', 'about_us', 'about, about us', '<h1>ABOUT GOWRISTBANDS</h1><p>Welcome to GoWristBands! We are one of the leading suppliers of customized silicone wristbands in UK. For the last 4 years, we are proudly supplying a wide range of <strong>custom silicone wristbands</strong> throughout the world. We are not any kind of marketing agency or agent who forwards your order to the supplier, but we supply wristbands directly to our customers as per their needs and budget.</p><p>We score a good rank in the third party review site <em>ResellerRatings.com</em> where customers left their feedbacks and reviews about our website and the products we offered to them. We have over 20,000 customer reviews and we got 5 out of 5 star rating for our exceptional services and products. So, if you are looking for some exceptional <strong>rubber wristbands</strong> for any occasion, then choosing us is a wise decision.</p><p>Regardless of what kind of wristbands you are looking for, we are a one shop stop for all your <strong>customized wristband</strong> needs. All our products are of high quality and appropriate for family reunions, awareness campaign, fund raising, birthday parties, corporate marketing, promotions and other occasions.</p><p>On our customized <strong>silicone wristbands, </strong>we can put your desired logo, digital image, standard clip arts or personal message and gift it to your family, friends and loved ones. Our <strong>promotional wristbands with a message</strong> are always in demand for marketing purpose.</p><p>Beside <strong>custom message wristbands</strong>, we also offer rubber bracelet items, <strong>printed wristbands</strong>,embossed bands and much more. All our <strong>custom wristbands</strong> provide an excellent grip to your wrists and very comfortable for regular use. All our wristbands are made from 100% silicone. The other kinds of wristbands we offer are <strong>embossed wristbands</strong>, <strong>colour-filled wristbands</strong>, <strong>debossed wristbands</strong>, figured wristbands, imprinted silicone wristbands, glow in the dark, segmented, Swirl and <strong>rubber wristbands</strong>.</p><p>No matter where you reside in the world, we ensure to deliver high quality of customized silicone wristbands right at your doorstep. </p><p><span style=\\"text-decoration: underline;\\">We offer the LOWEST PRICE GUARANTEE and FREE SHIPPING on all orders anywhere in the world. </span></p><p>Let us help you to design your own customized wristbands and promote your business! You never know, may be your band could be the next upcoming trend!</p><p>If you have any suggestions or questions regarding our customized silicone bracelets, feel free to contact us! For placing your order call us at 0-800-047-0904 or drop us an email at sales@gowristbands.co.uk. One of our representatives will assist you with the bracelets and wristband design according to your requirements. You can also shop online by exploring our website to make your customized wristbands.</p>', 1, 0, '2015-02-10 10:55:02', '2015-02-19 10:01:10'),
(57, 'PO ORDERS ', 'po_orders', 'PO ORDERS ', '<div class=\\"col-lg-9 col-md-9 col-sm-9\\"><div class=\\"right_content\\"><h1>PO ORDER</h1><div class=\\"content_order\\"><p>Step 1: Go to the Order Now page and select appropriate option of your order details. Once done entering all the details, click Add to cart in the bottom.</p><p>Step 2: Continue through the My-cart page. Click \\"Continue as Order.\\"</p><p>Step 3: Now that your on the checkout page, fill out shipping and billing address. Once you get to the payment section, click on the \\"pay by check\\" radio button and click the submit button.</p><p>When sending us a check please include a copy of your order number along with the check.</p><p>Fax us the Purchase Order to 000-000-0000 or email at sales@wristband24/7.com with your order number.</p><p>Our sales team will send you a proof and confirm the order details.</p><p>Credit Cards, Check, and Paypal are the available methods of payment.</p><p>You order will go under production once the payment and proof had been approved.</p><p>Additional Information:</p><p>Suite 123 <br /> Houston, TX 123 <br /> 3. ADD 12 FORM</p><p>4. Orders that are not paid within Net 30 will be charged collection fee of 20% on top of the original order amount.</p><p>5. <a href=\\"#\\">Click here</a> to view Terms and Conditions</p></div></div></div>', 1, 0, '2015-02-18 18:35:45', '2015-02-18 18:35:45'),
(58, 'Term and Condition', 'term_and_condition', '', '<h1>TERMS AND CONDITIONS</h1><p>You should spend some time reading through the following terms and conditions thoroughly. Use of this website will be taken to mean that you have agreed to the terms and conditions and any changes that are made to them in the future. It is in your own interest to have read the details below carefully.</p><p>GoWristBands.co.uk maintains the right to change or update the Terms and Conditions at any time without notice. You are encouraged to review the Terms and Conditions specified below carefully as no other notification of any changes will be made, except on this website.</p><p><strong>The Ordering Process</strong></p><p>Payment for goods can be made in a number of different ways. We accept payment by credit card , PayPal, Cheque and Bank Transfers as well as by email, phone and chat. Please make payment at the time of ordering your merchandise. Acceptable credit cards include American Express, Discover, MasterCard and Visa. Cheques or postal orders may be used by certain approved customers only, such as churches, schools and some businesses. Please ask if you are unsure. An invoice will be available when your order is finalised. GoWristBands.co.uk retains the right to refuse an order if necessary. There is an option to pay by Cheque option available. We always recommend to select digital proof as &ldquo;YES\\" which is absolutely free so that you can check what you are ordering.</p><p>Please note that the extra 100 free wristband offer only applies to one particular style and is only available to a customer who purchases 100 or more wristbands of anyone type. The message/text/logo must be same on all the bands to take advantage of this offer. When upgrading the order in keychain, the offer is to get wristbands NOT key chains</p><p><strong>Cancellations and Changes</strong></p><p>Cancellations and changes to your order may be possible if the final production of your wristbands has not actually commenced. GoWristBands.co.uk, in any event, will do its best to carry out your request to cancel or change your order. Any cancellations or changes should be made within 6 hours of placing your order when you have not Digital proof as YES. If your order has not yet reached the initial production stage, then any alterations will be completely free. However, if the order is in the pre-production stage, but not yet in the final stages of production, a &pound;7 cancellation or change fee does apply. Please contact our sales department if you need to cancel or change your order.</p><p>Once full production has begun, it will be impossible to cancel or change your order. However, we can change the delivery address or even stop the delivery altogether, but you will still be charged the full rate applicable for the order.</p><p>RUSH orders cannot be cancelled or changed once the order has been finalised.</p><p><strong>Refunds Policy</strong></p><p>Refunds will only be given in certain circumstances. Refunds will not be given, for instance, if</p><ul style=\\"padding-left: 15px;\\"><li>Customers making an error in their own order, e.g. a typo, state the wrong colour etc.</li><li>The production date is not as originally stated.</li><li>Selection of wrong font.</li><li>Difference in colour Match</li><li>Non availability of customer while delivery and courier service destroys the package</li></ul><p>Partial refunds may be given if the goods are shipped late, but restricted to the shipping costs on a pro rata basis only. Production costs are not refundable. In the event of any refund, the full amount of the refund will not exceed the cost of the original order.</p><p>Orders Duplicated while placing the order must be informed before the order is in production. Please check your order receipt and inform as soon as possible to our sales department.</p><p>Any defective products received should be notified within 7 to 15 days of delivery. They should be returned to the company with the valid RMA number clearly displayed. Contact us at sales@gowristbands.co.uk or by telephone at 0800-047-0904 for details.</p><p>We will examine your request to make sure it fulfils the conditions suitable for the product you have ordered. If we need to make any small modifications, then we will do this free of charge.</p><p>If you make a repeat order for goods, it will not be possible to guarantee exactly the same colour wristband.</p><p>Wrist bands will be laser engraved if your order is for less than 100 in a debossed style.</p><p>Swirl bands may result in bleeding of colours depending upon the selection of colours .</p><p>Limits to Colour Matching in Website or email Proofs</p><p>GoWristBands.co.uk will endeavour to make every effort to provide you with a product that matches the colour chosen form the website. However, the colours shown both on the website images as well as the proofs sent to you by email can never represent the exact colours of the wristbands in every detail. It is an inherent problem in the electronic representation of images that there may be a slight difference between the image and the final product. The manufactured item will have colour &ldquo;U\\" applied, rather than the pantone colour &ldquo;C\\".</p><p>If you have ordered swirl bands, the final colour depends on the way the colours chosen mix together.</p><p><strong>Reorders</strong></p><p>Every attempt to match a reorder to the original order will be made, but we cannot guarantee that your reordered goods will be an exact match.</p><p><strong>Production</strong></p><p>oWristBands.co.uk will endeavour to get your goods produced as soon as possible after your order has been finalised and artwork instructions submitted. The actual production time may vary depending on the number of bands ordered and the design requested. Normally, this is between 1 to 7 days after the order has been received. If you need your bands urgently, please contact our sales department and we will do what we can to rush through your order.</p><p>We have the right to start the production on any order where customer is not replying more then the specified deadline.</p><p><strong>Shipping</strong></p><p>We guarantee that your merchandise will be dispatched on or before the shipping date given when your order was finalised, however we cannot guarantee the time taken by the carrier, as this is out of our control. We are also not responsible for any delays due to customs formalities if it is an international order.</p><p>There will be further fees charged if you change any shipping requests after the goods have been dispatched and while they are already in transit.</p><p>If you change a shipping address while the goods are already in transit, a &pound;14 fee will be charged using the same payment method used for the original order.</p><p>If goods are returned to the company or re-routed for any reason, a &pound;28 fee is applicable.</p><p><strong>International Customers</strong></p><p>GoWristBands.co.uk is not responsible for any customs fees applicable on delivery to an overseas address. This is entirely the responsibility of the customer; such fees are not included in the shipping costs. Any request to mark the goods as gifts or at a lower value than the correct one will be refused.</p><p><strong>Prices</strong></p><p>We will make every effort to maintain the advertised pricing policy, but reserve the right to make changes at any time, depending on changes in the market. This could affect the price per item or the minimum number required for an order.</p><p>If any error is made in an advertised price or minimum quantity required, then GoWristBands.co.uk maintains the right to cancel or refuse any order made in such conditions. We will, however, make every effort to modify your order so it is affordable and within your budget.</p><p><strong>Acceptable Credit/Debit Cards</strong></p><p>You can pay by the following credit cards: American Express, Discover, MasterCard and Visa Credit/Debit card, PayPal as well as Cheque.</p><p><strong>Copyright</strong></p><p>The content of this website is protected by copyright and can only be used for non-commercial uses. This protection applies to all graphics, illustrations and images, logos, page headers and text within the website. The GoWristBands.co.uk logo is a registered trademark held by the company. The entire content of the website is registered under U.K. copyright laws and the company owns the right to arrange, change, enhance and select any or all of the content.</p><p>Portions of the website may be downloaded or copied for non commercial personal use only. Users of this website are permitted to use portions of the website for their own personal use as long as they do not alter or remove any logos, copyright or trademark notices and do not post any portion of the website on another computer network of any type or broadcast any portion of the website on the media.</p><p style=\\"color: #ccc;\\">Head office: Ghongzhou Trading Co. Ltd., DongWang Lake no.31, Suite 62-65, Haojing YongJing, Yanbu, Nanhai Dali Area Foshan city Guangdong Province zip code: 528247 phone: 86-757-85767935</p>', 1, 0, '2015-02-19 10:34:33', '2015-02-19 10:34:33'),
(59, 'Silicone Wristbands', 'silicone_wristbands', '', '<h1>Custom Silicon Wristbands</h1><p>WristbandToday.Com is a leading manufacturer of high quality silicone wristbands and also awareness bracelets. We supply a wide range of 100% silicone wristbands for recognition, team sports, marketing &amp; promotion, special events, clubs, fundraisers and awareness. We strive to design and deliver the utmost quality custom silicone wristbands in a range of colors and with customization options</p><h4>Custom Silicone Wristbands for Promotions, Awareness and Fundraising</h4><p>These are used to promote awareness regarding diseases like AIDS, cancer, advertise for businesses, music promotions, sports, or event promotion. We offer a wide variety of high quality silicone wristbands &amp; custom promotional products that can be personalized according your needs.</p><h4>Silicone Wristbands- Customizing Options</h4><p>WristbandToday.Com we offer a wide variety of color choices and customization options to make your own own awareness bracelets and wristbands. With our unique procedure we can incise any badge, clipart or manuscript of any length around your wristbands. You can choose your silicone wristbands in a variety of styles, from embossed, debossed, or Glow in the Dark. You can also select printed, swirled or segmented styles for custom wristbands that suit your needs perfectly. We are able to offer very low prices for our quality products by being the manufacturers. We do not use third party vendors for our custom silicone wristbands. We strive to offer the most competitive prices in the industry with the best quality. Our highly trained professionals are ready to assist you with your design and purchase. For any queries or questions you can call us at or email at</p>', 1, 0, '2015-02-19 11:00:59', '2015-02-19 17:29:11'),
(60, 'Custom Bracelets', 'custom_bracelets', '', '<h1>Custom Bracelets</h1><p>WristbandToday.Com provides high quality custom rubber bracelets. These bracelets are an inexpensive and effective promotional item. They are very popular and used in a wide variety of applications. Custom rubber bracelets have become a perfect medium worldwide to raise money and promote your message or cause. With our quality personalized bracelets you can do much.</p><h4>Custom Rubber Band Bracelets are perfect for:</h4><p>Custom rubber bracelets have become increasingly popular because of their unlimited number of uses as they can be easily personalized. With customized designs, they are an important tool to promote any product, brand, business advertisement or promotion.</p><ul><li>Schools</li><li>Colleges and universities</li><li>Organizations</li><li>Schools</li><li>Foundations</li><li>Sports programs</li><li>Businesses</li><li>And more</li></ul><p><br /> We offer a wide range of rubber band bracelets in a variety of color options and designs that you can choose for your custom rubber wristband.</p><h4>Debossed Bracelets - Silicone Wristbands - Customizing Options</h4><p>Debossed bracelets are by far the most admired Custom Bracelets. Our Debossed bracelets are made of 100% silicone.</p><h4>Embossed Bracelets - Silicone Wristbands - Customizing Options</h4><p>Embossed bracelets are used chiefly by our consumers looking to adjoin an extra edge to their silicone wristband. We can raise any text of any length, or design all the way around the wristband.</p><h4>Glow In The Dark Bracelets - Silicone Wristbands</h4><p>These bracelets are suitable for wet or dry applications that are extremely comfortable to wear and are the latest innovation in bracelets.</p><p>With our unique procedure we can incise any badge, clipart or manuscript of any length around your rubber bracelets. We endeavor to propose and convey the utmost quality custom silicone wristbands money can procure. We strive to offer the most competitive prices in the industry with the best quality. Our highly trained professionals are ready to assist you with your design and purchase. For any queries or questions you can call us at 832-789-1804 or email at sales@wristbandtoday.com</p>', 1, 0, '2015-02-19 11:15:24', '2015-02-19 17:35:45'),
(61, 'Custom Wristbands', 'custom_wristbands', '', '<h1>Custom Wristbands</h1><p>WristbandToday.Com is a leading wristband manufacturer, offering a great range of custom silicone wristbands, printed wristbands, rubber wristbands and multi color wristbands for your event, attraction, brand awareness or charity. <br /> Our bracelets can be a great way to promote your business, service or organization, and are an excellent way to position your brand name in front of your target market. These customized wristbands are perfect for promotional marketing, awareness for charities and fundraising. <br /> With our unique procedure we can incise any logo, text or message of any length in our wristbands. Custom wristbands are an excellent choice for schools, churches, fund raisers, or promotional events to display a first class product. Our high quality bands are manufactured to the exact standard specifications, matching the quality of Livestrong bracelets. <br /> At WristbandToday.Com there\\''s no fine print; we do not have a mold charge, setup fee or any other hidden fees. In addition to the lowest pricing in the industry, we also offer the best quality and a 100% customer satisfaction.</p><h4>Custom Silicone Wristbands</h4><p>We manufacture wristbands only 100% silicone. Our silicone wristbands are manufactured to the EXACT specifications and quality of the popular LiveStrong wristbands.</p><h4>Custom Printed Wristbands</h4><p>In printed wristbands you can craft your very own message, text, badge. Any logo or message can be printed on the outer side of the wristband.</p><h4>Custom Rubber Wristbands</h4><p>We customize rubber wristbands with your own personal message or logo in any color or color combination you need .</p><h4>Multi Colored Wristbands</h4><p>Multi colored wristbands are both eye catching and fashionable for those looking to make a style statement.</p><h4>Tyvek Wristbands</h4><p>Also known as paper wristbands, these are popular for concerts, bars, parks and other events that require tracking of people.</p><h4>Party Wristbands</h4><p>We offer fashionable, stylish, comfortable to wear and great looking party wristbands. Our Personalized party wristbands are perfect for birthday parties, functions</p><p>With our unique procedure we can incise any badge, clipart or manuscript of any length around your rubber bracelets. We endeavor to propose and convey the utmost quality custom silicone wristbands money can procure. We strive to offer the most competitive prices in the industry with the best quality. Our highly trained professionals are ready to assist you with your design and purchase. For any queries or questions you can call us at 832-789-1804 or email at sales@wristbandtoday.com</p>', 1, 0, '2015-02-19 11:48:03', '2015-02-19 17:34:26'),
(62, 'Custom Rubber Wristbands', 'custom_rubber_wristbands', '', '<h1>Custom Rubber Wristbands</h1><p>WristbandToday.Com is a leading rubber wristbands manufacturer, offering a great range of customized bracelets. Our rubber wristbands are most commonly used for admission control, single and multi-day events, verification, promotional marketing, special access and group identification purposes, etc. <br /> We offer a wide variety of customized rubber wristbands in a large range of styles and colors to meet your needs. Our extensive rubber selection of wristbands for events, customization services, unbeatable pricing, and customer service are certain to impress you.</p><h4>Custom Rubber Wristbands for Promotions &amp; Advertisement</h4><p>Custom rubber wristbands have become increasingly popular throughout the world because of their unlimited number of uses. They are an important tool to promote any product, brand, business advertisement or promotion.</p><h4>Rubber Wristbands- Customizable Options</h4><p>Using our unique procedure we can incise any badge, clipart or manuscript of any length around your wristbands. You can choose your rubber wristbands in a variety of styles, embossed, debossed, Glow in the Dark; to name a few options. You can also select printed, swirled or segmented styles for custom wristbands that suit your needs perfectly.</p><h4>Rubber Wristbands- Color Options</h4><p>At WristbandToday.Com rubber wristbands are available in a wide range of styles and colors. We customize rubber wristbands with your own personal message or logo, in any color or color combination you need. We are able to offer an unbeatable price benefit by being the manufacturer. We do not use third party vendors for our custom rubber wristbands.</p><p>With our unique procedure we can incise any badge, clipart or manuscript of any length around your rubber bracelets. We endeavor to propose and convey the utmost quality custom silicone wristbands money can procure. We strive to offer the most competitive prices in the industry with the best quality. Our highly trained professionals are ready to assist you with your design and purchase. For any queries or questions you can call us at 832-789-1804 or email at sales@wristbandtoday.com</p>', 1, 0, '2015-02-19 11:59:36', '2015-02-19 17:31:14'),
(63, 'Disclaimer', 'disclaimer', '', '<h1>Disclaimer</h1><p>The www.WristbandToday.Com Web Site (the \\"Site\\") is an online information service provided by WristbandToday.Com (\\"www.WristbandToday.Com \\"), subject to your compliance with the terms and conditions set forth below. PLEASE READ THIS DOCUMENT CAREFULLY BEFORE ACCESSING OR USING THE SITE. BY ACCESSING OR USING THE SITE, YOU AGREE TO BE BOUND BY THE TERMS AND CONDITIONS SET FORTH BELOW. IF YOU DO NOT WISH TO BE BOUND BY THESE TERMS AND CONDITIONS, YOU MAY NOT ACCESS OR USE THE SITE. www.WristbandToday.Com MAY MODIFY THIS AGREEMENT AT ANY TIME, AND SUCH MODIFICATIONS SHALL BE EFFECTIVE IMMEDIATELY UPON POSTING OF THE MODIFIED AGREEMENT ON THE SITE. YOU AGREE TO REVIEW THE AGREEMENT PERIODICALLY TO BE AWARE OF SUCH MODIFICATIONS AND YOUR CONTINUED ACCESS OR USE OF THE SITE SHALL BE DEEMED YOUR CONCLUSIVE ACCEPTANCE OF THE MODIFIED AGREEMENT.</p><p><strong>1. Copyright, Licenses and Idea Submissions.</strong></p><p>The entire contents of the Site are protected by international copyright and trademark laws. The owner of the copyrights and trademarks are www.WristbandToday.Com, its affiliates or other third party licensors. YOU MAY NOT MODIFY, COPY, REPRODUCE, REPUBLISH, UPLOAD, POST, TRANSMIT, OR DISTRIBUTE, IN ANY MANNER, THE MATERIAL ON THE SITE, INCLUDING TEXT, GRAPHICS, CODE AND/OR SOFTWARE. You may print and download portions of material from the different areas of the Site solely for your own non-commercial use provided that you agree not to change or delete any copyright or proprietary notices from the materials. You agree to grant to www.WristbandToday.Com a non-exclusive, royalty-free, worldwide, perpetual license, with the right to sub-license, to reproduce, distribute, transmit, create derivative works of, publicly display and publicly perform any materials and other information (including, without limitation, ideas contained therein for new or improved products and services) you submit to any public areas of the Site (such as bulletin boards, forums and newsgroups) or by e-mail to www.WristbandToday.Com by all means and in any media now known or hereafter developed. You also grant to www.WristbandToday.Com the right to use your name in connection with the submitted materials and other information as well as in connection with all advertising, marketing and promotional material related thereto. You agree that you shall have no recourse against www.WristbandToday.Com for any alleged or actual infringement or misappropriation of any proprietary right in your communications to www.WristbandToday.Com.<br /> <strong>TRADEMARKS.</strong></p><p>Publications, products, content or services referenced herein or on the Site are the exclusive trademarks or servicemarks of www.WristbandToday.Com. Other product and company names mentioned in the Site may be the trademarks of their respective owners.</p><p><strong>2. Use of the Site.</strong></p><p>You understand that, except for information, products or services clearly identified as being supplied by www.WristbandToday.Com, www.WristbandToday.Comdoes not operate, control or endorse any information, products or services on the Internet in any way. Except for www.WristbandToday.Com- identified information, products or services, all information, products and services offered through the Site or on the Internet generally are offered by third parties, that are not affiliated with www.WristbandToday.Com a. You also understand that www.WristbandToday.Com cannot and does not guarantee or warrant that files available for downloading through the Site will be free of infection or viruses, worms, Trojan horses or other code that manifest contaminating or destructive properties. You are responsible for implementing sufficient procedures and checkpoints to satisfy your particular requirements for accuracy of data input and output, and for maintaining a means external to the Site for the reconstruction of any lost data.</p><p>YOU ASSUME TOTAL RESPONSIBILITY AND RISK FOR YOUR USE OF THE SITE AND THE INTERNET. www.WristbandToday.Com PROVIDES THE SITE AND RELATED INFORMATION \\"AS IS\\" AND DOES NOT MAKE ANY EXPRESS OR IMPLIED WARRANTIES, REPRESENTATIONS OR ENDORSEMENTS WHATSOEVER (INCLUDING WITHOUT LIMITATION WARRANTIES OF TITLE OR NONINFRINGEMENT, OR THE IMPLIED WARRANTIES OF MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE) WITH REGARD TO THE SERVICE, ANY MERCHANDISE INFORMATION OR SERVICE PROVIDED THROUGH THE SERVICE OR ON THE INTERNET GENERALLY, AND www.WristbandToday.Com SHALL NOT BE LIABLE FOR ANY COST OR DAMAGE ARISING EITHER DIRECTLY OR INDIRECTLY FROM ANY SUCH TRANSACTION. IT IS SOLELY YOUR RESPONSIBILITY TO EVALUATE THE ACCURACY, COMPLETENESS AND USEFULNESS OF ALL OPINIONS, ADVICE, SERVICES, MERCHANDISE AND OTHER INFORMATION PROVIDED THROUGH THE SERVICE OR ON THE INTERNET GENERALLY. www.WristbandToday.Com DOES NOT WARRANT THAT THE SERVICE WILL BE UNINTERRUPTED OR ERROR-FREE OR THAT DEFECTS IN THE SERVICE WILL BE CORRECTED.</p><p>YOU UNDERSTAND FURTHER THAT THE PURE NATURE OF THE INTERNET CONTAINS UNEDITED MATERIALS SOME OF WHICH ARE SEXUALLY EXPLICIT OR MAY BE OFFENSIVE TO YOU. YOUR ACCESS TO SUCH MATERIALS IS AT YOUR RISK. www.WristbandToday.Com HAS NO CONTROL OVER AND ACCEPTS NO RESPONSIBILITY WHATSOEVER FOR SUCH MATERIALS.</p><p><strong>LIMITATION OF LIABILITY</strong></p><p>IN NO EVENT WILL www.WristbandToday.Com BE LIABLE FOR (I) ANY INCIDENTAL, CONSEQUENTIAL, OR INDIRECT DAMAGES (INCLUDING, BUT NOT LIMITED TO, DAMAGES FOR LOSS OF PROFITS, BUSINESS INTERRUPTION, LOSS OF PROGRAMS OR INFORMATION, AND THE LIKE) ARISING OUT OF THE USE OF OR INABILITY TO USE THE SERVICE, OR ANY INFORMATION, OR TRANSACTIONS PROVIDED ON THE SERVICE, OR DOWNLOADED FROM THE SERVICE, OR ANY DELAY OF SUCH INFORMATION OR SERVICE. EVEN IF www.WristbandToday.Com OR ITS AUTHORIZED REPRESENTATIVES HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES, OR (II) ANY CLAIM ATTRIBUTABLE TO ERRORS, OMISSIONS, OR OTHER INACCURACIES IN THE SERVICE AND/OR MATERIALS OR INFORMATION DOWNLOADED THROUGH THE SERVICE. BECAUSE SOME STATES DO NOT ALLOW THE EXCLUSION OR LIMITATION OF LIABILITY FOR CONSEQUENTIAL OR INCIDENTAL DAMAGES, THE ABOVE LIMITATION MAY NOT APPLY TO YOU. IN SUCH STATES, www.WristbandToday.Com LIABILITY IS LIMITED TO THE GREATEST EXTENT PERMITTED BY LAW.</p><p>www.WristbandToday.Com makes no representations whatsoever about any other web site which you may access through this one or which may link to this Site. When you access a non-www.WristbandToday.Com web site, please understand that it is independent from www.WristbandToday.Com, and that www.WristbandToday.Com has no control over the content on that web site. In addition, a link to a www.WristbandToday.Com web site does not mean that www.WristbandToday.Com endorses or accepts any responsibility for the content, or the use, of such web site.</p><p><strong>3. Indemnification.</strong></p><p>You agree to indemnify, defend and hold harmless www.WristbandToday.Com, its officers, directors, employees, agents, licensors, suppliers and any third party information providers to the Service from and against all losses, expenses, damages and costs, including reasonable attorneys fees, resulting from any violation of this Agreement (including negligent or wrongful conduct) by you or any other person accessing the Service.</p><p><strong>4. Third Party Rights.</strong></p><p>The provisions of paragraphs 2 (Use of the Service), and 3 (Indemnification) are for the benefit of www.WristbandToday.Com and its officers, directors, employees, agents, licensors, suppliers, and any third party information providers to the Service. Each of these individuals or entities shall have the right to assert and enforce those provisions directly against you on its own behalf.</p><p><strong>5.Term Termination.</strong></p><p>This Agreement may be terminated by either party without notice at any time for any reason. The provisions of paragraphs 1 (Copyright, Licenses and Idea Submissions), 2 (Use of the Service), 3 (Indemnification), 4 (Third Party Rights) and 6 (Miscellaneous) shall survive any termination of this Agreement.</p><p><strong>6.Miscellaneous.</strong></p><p>This Agreement shall all be governed and construed in accordance with the laws of The United States of America applicable to agreements made and to be performed in The United States of America. You agree that any legal action or proceeding between www.WristbandToday.Com and you for any purpose concerning this Agreement or the parties obligations hereunder shall be brought exclusively in a federal or state court of competent jurisdiction sitting in The United States of America . Any cause of action or claim you may have with respect to the Service must be commenced within one (1) year after the claim or cause of action arises or such claim or cause of action is barred. www.WristbandToday.Com failure to insist upon or enforce strict performance of any provision of this Agreement shall not be construed as a waiver of any provision or right. Neither the course of conduct between the parties nor trade practice shall act to modify any provision of this Agreement. www.WristbandToday.Com may assign its rights and duties under this Agreement to any party at any time without notice to you.</p><p>If you have any questions or comments, feel free to contact us at: <a href=\\"mailto:sales@wristbandtoday.com\\">sales@wristbandtoday.com</a> .</p>', 1, 0, '2015-02-19 12:26:44', '2015-02-19 17:27:14'),
(64, 'Color_Wristband', 'color_wristband', '', '<h1>Color Wristband</h1><p>Our wristbands come in various colors. Colored wristbands are used for various purposes. The different colors of wristbands are used for different purposes, like the yellow wristband denotes cancer awareness, black denotes sleep disorders and mourning, Blue wristbands symbolize prevention of child abuse, colon cancer, prostate cancer, animal rights, Tsunami victims and Red wristbands are used to support cancer, diabetes, aids and heart disease.</p><h4>White Wristbands</h4><p>White wristband is a common symbol of the global fight to end poverty. White wristbands represent <strong>global fight to end poverty</strong></p><h4>Black Wristbands</h4><p>Black wristbands are used for accident purpose. They denote sleep disorders and mourning. Black wristbands denote <strong>sleep disorders and mourning</strong></p><h4>Red Wristbands</h4><p>Red wristbands are used for various causes to support people who are suffering from AIDS, Cancer, Diabetes and Heart Disease. Red wristband represents<strong> Courage, Hope and Strength</strong></p><h4>Blue Wristbands</h4><p>Blue wristbands symbolize prevention of Colon cancer, Prostate cancer, Animal rights abuse, Child abuse. Blue wristband represents <strong>spirituality, grace and truth</strong></p><h4>Color Wristbands- Customization Options</h4><p>We can incise any badge, clipart or manuscript of any length around your wristbands. We offer various colors that you can choose for your wristbands. However, if you need to match an exact color or would prefer another color than we can customize wristbands for you as well.</p><p>With our unique procedure we can incise any badge, clipart or manuscript of any length around your rubber bracelets. We endeavor to propose and convey the utmost quality custom silicone wristbands money can procure. We strive to offer the most competitive prices in the industry with the best quality. Our highly trained professionals are ready to assist you with your design and purchase. For any queries or questions you can call us at 832-789-1804 or email at sales@wristbandtoday.com</p>', 1, 0, '2015-02-19 12:40:28', '2015-02-19 17:32:39'),
(66, 'Privacy Policy', 'privacy_policy', 'privacy_policy', '<h1>Privacy Policy</h1><p>This Privacy Policy governs the manner in which WristbandToday.Com collects, uses, maintains and discloses information collected from users (each, a \\\\\\"User\\\\\\") of the <a href=\\"\\\\&quot;http:/www.WristbandToday.Com\\\\&quot;\\">http://www.WristbandToday.Com</a> website (\\\\\\"Site\\\\\\"). This privacy policy applies to the Site and all products and services offered by WristbandToday.Com.</p><p><strong>Personal identification information</strong></p><p>We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, place an order, fill out a form, and in connection with other activities, services, features or resources we make available on our Site. Users may be asked for, as appropriate, name, email address, mailing address, phone number, credit card information. Users may, however, visit our Site anonymously. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.</p><p><strong>Non-personal identification information</strong></p><p>We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.</p><p><strong>Web browser cookies</strong></p><p>Our Site may use \\\\\\"cookies\\\\\\" to enhance User experience. User\\\\\\''s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.</p><p><strong>How we use collected information</strong></p><p>WristbandToday.Com may collect and use Users personal information for the following purposes:</p><ul><li>To improve customer service<br /> Information you provide helps us respond to your customer service requests and support needs more efficiently.</li><li>To personalize user experience<br /> We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site.</li><li>To improve our Site<br /> We may use feedback you provide to improve our products and services.</li><li>To process payments<br /> We may use the information Users provide about themselves when placing an order only to provide service to that order. We do not share this information with outside parties except to the extent necessary to provide the service.</li><li>To run a promotion, contest, survey or other Site feature<br /> To send Users information they agreed to receive about topics we think will be of interest to them.</li><li>To send periodic emails<br /> We may use the email address to send User information and updates pertaining to their order. It may also be used to respond to their inquiries, questions, and/or other requests. If User decides to opt-in to our mailing list, they will receive emails that may include company news, updates, related product or service information, etc. If at any time the User would like to unsubscribe from receiving future emails, we include detailed unsubscribe instructions at the bottom of each email or User may contact us via our Site.</li></ul><p><strong>How we protect your information</strong></p><p>We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorized access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site.</p><p>Sensitive and private data exchange between the Site and its Users happens over a SSL secured communication channel and is encrypted and protected with digital signatures.</p><p><strong>Sharing your personal information</strong></p><p>We do not sell, trade, or rent Users personal identification information to others. We may share generic aggregated demographic information not linked to any personal identification information regarding visitors and users with our business partners, trusted affiliates and advertisers for the purposes outlined above.</p><p><strong>Changes to this privacy policy</strong></p><p>WristbandToday.Com has the discretion to update this privacy policy at any time. When we do, we will post a notification on the main page of our Site, revise the updated date at the bottom of this page. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.</p><p><strong>Your acceptance of these terms</strong></p><p>By using this Site, you signify your acceptance of this policy and <a id=\\"\\\\&quot;wbt-terms\\\\&quot;\\" class=\\"\\\\&quot;cboxElement\\\\&quot;\\" href=\\"\\\\&quot;http:/www.wristbandtoday.com/ajax/terms.php\\\\&quot;\\">terms of service</a>. If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.</p><p><strong>Contacting us</strong></p><p>If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at:<br /> WristbandToday.Com<br /> 1002 Gemini St.<br /> Suite 105<br /> Houston, TX 77058 <br /> <strong>Phone:</strong>1-844-879-7022<br /> <strong>Email:</strong>sales@wristbandtoday.com<br /><br /> This document was last updated on January 10, 2013</p>', 1, 0, '2015-02-19 16:44:38', '2015-02-19 17:36:21'),
(67, 'Blog', 'blog', 'blog', '<h1>Blog</h1><p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</p><p><strong>1. </strong><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><strong>2. </strong><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><strong>3. </strong><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><strong>4. </strong><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><strong>5. </strong><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1, 0, '2015-02-19 16:48:19', '2015-02-19 16:48:19'),
(68, 'FAQ', 'faq', '', '<h1>FAQ</h1><div id=\\"&quot;&quot;accordion&quot;&quot;\\" class=\\"&quot;&quot;panel-group&quot;&quot;\\"><div class=\\"&quot;&quot;panel&quot;\\"><div id=\\"&quot;&quot;headingOne&quot;&quot;\\" class=\\"&quot;&quot;panel-heading&quot;&quot;\\"><h4 class=\\"&quot;&quot;panel-title&quot;&quot;\\"><a href=\\"&quot;&quot;#collapseOne&quot;&quot;\\" data-toggle=\\"&quot;&quot;collapse&quot;&quot;\\" data-parent=\\"&quot;&quot;#accordion&quot;&quot;\\"> Collapsible Group Item #1 </a></h4></div><div id=\\"&quot;&quot;collapseOne&quot;&quot;\\" class=\\"&quot;&quot;panel-collapse&quot;\\"><div class=\\"&quot;&quot;panel-body&quot;&quot;\\">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\\''t heard of them accusamus labore sustainable VHS.</div></div></div><div class=\\"&quot;&quot;panel&quot;\\"><div id=\\"&quot;&quot;headingTwo&quot;&quot;\\" class=\\"&quot;&quot;panel-heading&quot;&quot;\\"><h4 class=\\"&quot;&quot;panel-title&quot;&quot;\\"><a class=\\"&quot;&quot;collapsed&quot;&quot;\\" href=\\"&quot;&quot;#collapseTwo&quot;&quot;\\" data-toggle=\\"&quot;&quot;collapse&quot;&quot;\\" data-parent=\\"&quot;&quot;#accordion&quot;&quot;\\"> Collapsible Group Item #2 </a></h4></div><div id=\\"&quot;&quot;collapseTwo&quot;&quot;\\" class=\\"&quot;&quot;panel-collapse&quot;\\"><div class=\\"&quot;&quot;panel-body&quot;&quot;\\">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\\''t heard of them accusamus labore sustainable VHS.</div></div></div><div class=\\"&quot;&quot;panel&quot;\\"><div id=\\"&quot;&quot;headingThree&quot;&quot;\\" class=\\"&quot;&quot;panel-heading&quot;&quot;\\"><h4 class=\\"&quot;&quot;panel-title&quot;&quot;\\"><a class=\\"&quot;&quot;collapsed&quot;&quot;\\" href=\\"&quot;&quot;#collapseThree&quot;&quot;\\" data-toggle=\\"&quot;&quot;collapse&quot;&quot;\\" data-parent=\\"&quot;&quot;#accordion&quot;&quot;\\"> Collapsible Group Item #3 </a></h4></div><div id=\\"&quot;&quot;collapseThree&quot;&quot;\\" class=\\"&quot;&quot;panel-collapse&quot;\\"><div class=\\"&quot;&quot;panel-body&quot;&quot;\\">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\\''t heard of them accusamus labore sustainable VHS.</div></div></div></div>', 1, 0, '2015-02-20 09:17:08', '2015-02-20 16:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hex_value` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `hex_value`, `name`, `is_active`, `is_deleted`) VALUES
(1, '#ffffff', 'White', 1, 0),
(2, '#000000', 'Black', 1, 0),
(3, '#f20018', 'Red', 1, 0),
(4, '#ffa500', 'Orange', 1, 0),
(5, '#fff700', 'Yellow', 1, 0),
(6, '#93c47d', 'Lime-Green', 1, 0),
(7, '#3f831c', 'Green', 1, 0),
(8, '#1f6a65', 'Teal', 1, 0),
(9, '#83bad8', 'Light Blue', 1, 0),
(10, '#0335b0', 'Blue', 1, 0),
(11, '#2c208e', 'Royal-Blue', 1, 0),
(12, '#512874', 'Purple', 1, 0),
(13, '#82017f', 'Lavender', 1, 0),
(14, '#ce9b64', 'Light-Brown', 1, 0),
(15, '#8f4a05', 'Brown', 1, 0),
(16, '#ff1d7f', 'Hot-Pink', 1, 0),
(17, '#ffff7d', 'PMS 100', 1, 0),
(18, '#ffc211', 'PMS 122', 1, 0),
(19, '#fc9200', 'PMS 138', 1, 0),
(20, '#fc7c00', 'PMS 152', 1, 0),
(21, '#ed5001', 'PMS 159', 1, 0),
(22, '#ff5c01', 'PMS 166', 1, 0),
(23, '#fb6a4f', 'PMS 178', 1, 0),
(24, '#e23000', 'PMS 180', 1, 0),
(25, '#c9005c', 'PMS 220', 1, 0),
(26, '#7d0a29', 'PMS 216', 1, 0),
(27, '#f51261', 'PMS 213', 1, 0),
(28, '#f86db0', 'PMS 204', 1, 0),
(29, '#db002a', 'PMS 200', 1, 0),
(30, '#f83a68', 'PMS 198', 1, 0),
(31, '#a7001e', 'PMS 194', 1, 0),
(32, '#f20018', 'PMS 189', 1, 0),
(33, '#ef2f94', 'PMS 225', 1, 0),
(34, '#8d0148', 'PMS 226', 1, 0),
(35, '#d8027e', 'PMS 233', 1, 0),
(36, '#c91485', 'PMS 240', 1, 0),
(37, '#b11a8b', 'PMS 246', 1, 0),
(38, '#edb3d9', 'PMS 243', 1, 0),
(39, '#f0cee6', 'PMS 250', 1, 0),
(40, '#f47cbc', 'PMS 231', 1, 0),
(41, '#bad5e8', 'PMS 277', 1, 0),
(42, '#6f69b1', 'PMS 272', 1, 0),
(43, '#b0a5cf', 'PMS 270', 1, 0),
(44, '#775ba8', 'PMS 265', 1, 0),
(45, '#e5d4e7', 'PMS 263', 1, 0),
(46, '#913696', 'PMS 258', 1, 0),
(47, '#82017f', 'PMS 254', 1, 0),
(48, '#be68b1', 'PMS 252', 1, 0),
(49, '#567eb9', 'PMS 279', 1, 0),
(50, '#051843', 'PMS 282', 1, 0),
(51, '#83bad8', 'PMS 292', 1, 0),
(52, '#4fb0d1', 'PMS 298', 1, 0),
(53, '#b3e2dc', 'PMS 304', 1, 0),
(54, '#42b7c8', 'PMS 306', 1, 0),
(55, '#0fa1b8', 'PMS 312', 1, 0),
(56, '#7acbbc', 'PMS 319', 1, 0),
(57, '#50ae26', 'PMS 361', 1, 0),
(58, '#33a23c', 'PMS 354', 1, 0),
(59, '#006a3a', 'PMS 348', 1, 0),
(60, '#01874a', 'PMS 347', 1, 0),
(61, '#2aa475', 'PMS 339', 1, 0),
(62, '#01654b', 'PMS 335', 1, 0),
(63, '#c3e7cd', 'PMS 331', 1, 0),
(64, '#23a490', 'PMS 326', 1, 0),
(65, '#3d841c', 'PMS 363', 1, 0),
(66, '#addc6c', 'PMS 367', 1, 0),
(67, '#63ac1d', 'PMS 369', 1, 0),
(68, '#96d145', 'PMS 375', 1, 0),
(69, '#b5dc11', 'PMS 382', 1, 0),
(70, '#dcef3b', 'PMS 388', 1, 0),
(71, '#96a105', 'PMS 381', 1, 0),
(72, '#c3baa9', 'PMS 401', 1, 0),
(73, '#bec9b9', 'PMS 445', 1, 0),
(74, '#8a7268', 'PMS 437', 1, 0),
(75, '#ddccc5', 'PMS 435', 1, 0),
(76, '#3b3b3b', 'PMS 425', 1, 0),
(77, '#8f8f8f', 'PMS 423', 1, 0),
(78, '#bdbdbd', 'PMS 415', 1, 0),
(79, '#47402d', 'PMS 405', 1, 0),
(80, '#908776', 'PMS 403', 1, 0),
(81, '#7e8b7a', 'PMS 444', 1, 0),
(82, '#b282be', 'PMS 2573', 1, 0),
(83, '#9878b7', 'PMS 2577', 1, 0),
(84, '#4f6eb1', 'PMS 2722', 1, 0),
(85, '#0a58a3', 'PMS 2935', 1, 0),
(86, '#1d98c4', 'PMS 2995', 1, 0),
(87, '#2cacad', 'PMS 3125', 1, 0),
(88, '#016066', 'PMS 3155', 1, 0),
(89, '#c2c2c2', 'Cool Grey-4r', 1, 0),
(90, '#e6e6e6', 'Cool Grey-2r', 1, 0),
(91, '#ce9b64', 'PMS 4655', 1, 0),
(92, '#8f4a05', 'PMS 4636', 1, 0),
(93, '#27a166', 'PMS 3405', 1, 0),
(94, '#8cd1a2', 'PMS 3385', 1, 0),
(95, '#129a82', 'PMS 3572', 1, 0),
(96, '#4bb59e', 'PMS 3565', 1, 0),
(97, '#b0b0b0', 'Cool Grey-6r', 1, 0),
(98, '#918f90', 'Cool Grey-8r', 1, 0),
(99, '#666465', 'Cool Grey-10r', 1, 0),
(100, '#c2baad', ' Warm-Grey-4r', 1, 0),
(101, '#afa695', ' Warm-Grey-6r', 1, 0),
(102, '#908474', ' Warm-Grey-8r', 1, 0),
(103, '#72634c', ' Warm-Grey-10r', 1, 0),
(104, '#000000', 'Test', 1, 0),
(105, '#Color Code', 'Color Name', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `company_name`, `mobile`, `subject`, `message`, `created`) VALUES
(1, 'ankur', 'ankur@gmail.com', NULL, '9808214464', '', 'trhtrhrwefewf', '2015-02-17 17:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `countryName` varchar(45) NOT NULL DEFAULT '',
  `currencyCode` char(3) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=251 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryCode`, `countryName`, `currencyCode`, `status`, `is_deleted`) VALUES
(1, 'AD', 'Andorra', 'EUR', 1, 0),
(2, 'AE', 'United Arab Emirates', 'AED', 1, 0),
(3, 'AF', 'Afghanistan', 'AFN', 1, 0),
(4, 'AG', 'Antigua and Barbuda', 'XCD', 1, 0),
(5, 'AI', 'Anguilla', 'XCD', 1, 0),
(6, 'AL', 'Albania', 'ALL', 1, 0),
(7, 'AM', 'Armenia', 'AMD', 1, 0),
(8, 'AO', 'Angola', 'AOA', 1, 0),
(9, 'AQ', 'Antarctica', '', 1, 0),
(10, 'AR', 'Argentina', 'ARS', 1, 0),
(11, 'AS', 'American Samoa', 'USD', 1, 0),
(12, 'AT', 'Austria', 'EUR', 1, 0),
(13, 'AU', 'Australia', 'AUD', 1, 0),
(14, 'AW', 'Aruba', 'AWG', 1, 0),
(16, 'AZ', 'Azerbaijan', 'AZN', 1, 0),
(17, 'BA', 'Bosnia and Herzegovina', 'BAM', 1, 0),
(18, 'BB', 'Barbados', 'BBD', 1, 0),
(19, 'BD', 'Bangladesh', 'BDT', 1, 0),
(20, 'BE', 'Belgium', 'EUR', 1, 0),
(21, 'BF', 'Burkina Faso', 'XOF', 1, 0),
(22, 'BG', 'Bulgaria', 'BGN', 1, 0),
(23, 'BH', 'Bahrain', 'BHD', 1, 0),
(24, 'BI', 'Burundi', 'BIF', 1, 0),
(25, 'BJ', 'Benin', 'XOF', 1, 0),
(26, 'BL', 'Saint Barthélemy', 'EUR', 1, 0),
(27, 'BM', 'Bermuda', 'BMD', 1, 0),
(28, 'BN', 'Brunei', 'BND', 1, 0),
(29, 'BO', 'Bolivia', 'BOB', 1, 0),
(30, 'BQ', 'Bonaire', 'USD', 1, 0),
(31, 'BR', 'Brazil', 'BRL', 1, 0),
(32, 'BS', 'Bahamas', 'BSD', 1, 0),
(33, 'BT', 'Bhutan', 'BTN', 1, 0),
(34, 'BV', 'Bouvet Island', 'NOK', 1, 0),
(35, 'BW', 'Botswana', 'BWP', 1, 0),
(36, 'BY', 'Belarus', 'BYR', 1, 0),
(37, 'BZ', 'Belize', 'BZD', 1, 0),
(38, 'CA', 'Canada', 'CAD', 1, 0),
(39, 'CC', 'Cocos [Keeling] Islands', 'AUD', 1, 0),
(40, 'CD', 'Democratic Republic of the Congo', 'CDF', 1, 0),
(41, 'CF', 'Central African Republic', 'XAF', 1, 0),
(42, 'CG', 'Republic of the Congo', 'XAF', 1, 0),
(43, 'CH', 'Switzerland', 'CHF', 1, 0),
(44, 'CI', 'Ivory Coast', 'XOF', 1, 0),
(45, 'CK', 'Cook Islands', 'NZD', 1, 0),
(46, 'CL', 'Chile', 'CLP', 1, 0),
(47, 'CM', 'Cameroon', 'XAF', 1, 0),
(48, 'CN', 'China', 'CNY', 1, 0),
(49, 'CO', 'Colombia', 'COP', 1, 0),
(50, 'CR', 'Costa Rica', 'CRC', 1, 0),
(51, 'CU', 'Cuba', 'CUP', 1, 0),
(52, 'CV', 'Cape Verde', 'CVE', 1, 0),
(53, 'CW', 'Curacao', 'ANG', 1, 0),
(54, 'CX', 'Christmas Island', 'AUD', 1, 0),
(55, 'CY', 'Cyprus', 'EUR', 1, 0),
(56, 'CZ', 'Czech Republic', 'CZK', 1, 0),
(57, 'DE', 'Germany', 'EUR', 1, 0),
(58, 'DJ', 'Djibouti', 'DJF', 1, 0),
(59, 'DK', 'Denmark', 'DKK', 1, 0),
(60, 'DM', 'Dominica', 'XCD', 1, 0),
(61, 'DO', 'Dominican Republic', 'DOP', 1, 0),
(62, 'DZ', 'Algeria', 'DZD', 1, 0),
(63, 'EC', 'Ecuador', 'USD', 1, 0),
(64, 'EE', 'Estonia', 'EUR', 1, 0),
(65, 'EG', 'Egypt', 'EGP', 1, 0),
(66, 'EH', 'Western Sahara', 'MAD', 1, 0),
(67, 'ER', 'Eritrea', 'ERN', 1, 0),
(68, 'ES', 'Spain', 'EUR', 1, 0),
(69, 'ET', 'Ethiopia', 'ETB', 1, 0),
(70, 'FI', 'Finland', 'EUR', 1, 0),
(71, 'FJ', 'Fiji', 'FJD', 1, 0),
(72, 'FK', 'Falkland Islands', 'FKP', 1, 0),
(73, 'FM', 'Micronesia', 'USD', 1, 0),
(74, 'FO', 'Faroe Islands', 'DKK', 1, 0),
(75, 'FR', 'France', 'EUR', 1, 0),
(76, 'GA', 'Gabon', 'XAF', 1, 0),
(77, 'GB', 'United Kingdom', 'GBP', 1, 0),
(78, 'GD', 'Grenada', 'XCD', 1, 0),
(79, 'GE', 'Georgia', 'GEL', 1, 0),
(80, 'GF', 'French Guiana', 'EUR', 1, 0),
(81, 'GG', 'Guernsey', 'GBP', 1, 0),
(82, 'GH', 'Ghana', 'GHS', 1, 0),
(83, 'GI', 'Gibraltar', 'GIP', 1, 0),
(84, 'GL', 'Greenland', 'DKK', 1, 0),
(85, 'GM', 'Gambia', 'GMD', 1, 0),
(86, 'GN', 'Guinea', 'GNF', 1, 0),
(87, 'GP', 'Guadeloupe', 'EUR', 1, 0),
(88, 'GQ', 'Equatorial Guinea', 'XAF', 1, 0),
(89, 'GR', 'Greece', 'EUR', 1, 0),
(90, 'GS', 'South Georgia and the South Sandwich Islands', 'GBP', 1, 0),
(91, 'GT', 'Guatemala', 'GTQ', 1, 0),
(92, 'GU', 'Guam', 'USD', 1, 0),
(93, 'GW', 'Guinea-Bissau', 'XOF', 1, 0),
(94, 'GY', 'Guyana', 'GYD', 1, 0),
(95, 'HK', 'Hong Kong', 'HKD', 1, 0),
(96, 'HM', 'Heard Island and McDonald Islands', 'AUD', 1, 0),
(97, 'HN', 'Honduras', 'HNL', 1, 0),
(98, 'HR', 'Croatia', 'HRK', 1, 0),
(99, 'HT', 'Haiti', 'HTG', 1, 0),
(100, 'HU', 'Hungary', 'HUF', 1, 0),
(101, 'ID', 'Indonesia', 'IDR', 1, 0),
(102, 'IE', 'Ireland', 'EUR', 1, 0),
(103, 'IL', 'Israel', 'ILS', 1, 0),
(104, 'IM', 'Isle of Man', 'GBP', 1, 0),
(105, 'IN', 'India', 'INR', 1, 0),
(106, 'IO', 'British Indian Ocean Territory', 'USD', 1, 0),
(107, 'IQ', 'Iraq', 'IQD', 1, 0),
(108, 'IR', 'Iran', 'IRR', 1, 0),
(109, 'IS', 'Iceland', 'ISK', 1, 0),
(110, 'IT', 'Italy', 'EUR', 1, 0),
(111, 'JE', 'Jersey', 'GBP', 1, 0),
(112, 'JM', 'Jamaica', 'JMD', 1, 0),
(113, 'JO', 'Jordan', 'JOD', 1, 0),
(114, 'JP', 'Japan', 'JPY', 1, 0),
(115, 'KE', 'Kenya', 'KES', 1, 0),
(116, 'KG', 'Kyrgyzstan', 'KGS', 1, 0),
(117, 'KH', 'Cambodia', 'KHR', 1, 0),
(118, 'KI', 'Kiribati', 'AUD', 1, 0),
(119, 'KM', 'Comoros', 'KMF', 1, 0),
(120, 'KN', 'Saint Kitts and Nevis', 'XCD', 1, 0),
(121, 'KP', 'North Korea', 'KPW', 1, 0),
(122, 'KR', 'South Korea', 'KRW', 1, 0),
(123, 'KW', 'Kuwait', 'KWD', 1, 0),
(124, 'KY', 'Cayman Islands', 'KYD', 1, 0),
(125, 'KZ', 'Kazakhstan', 'KZT', 1, 0),
(126, 'LA', 'Laos', 'LAK', 1, 0),
(127, 'LB', 'Lebanon', 'LBP', 1, 0),
(128, 'LC', 'Saint Lucia', 'XCD', 1, 0),
(129, 'LI', 'Liechtenstein', 'CHF', 1, 0),
(130, 'LK', 'Sri Lanka', 'LKR', 1, 0),
(131, 'LR', 'Liberia', 'LRD', 1, 0),
(132, 'LS', 'Lesotho', 'LSL', 1, 0),
(133, 'LT', 'Lithuania', 'LTL', 1, 0),
(134, 'LU', 'Luxembourg', 'EUR', 1, 0),
(135, 'LV', 'Latvia', 'EUR', 1, 0),
(136, 'LY', 'Libya', 'LYD', 1, 0),
(137, 'MA', 'Morocco', 'MAD', 1, 0),
(138, 'MC', 'Monaco', 'EUR', 1, 0),
(139, 'MD', 'Moldova', 'MDL', 1, 0),
(140, 'ME', 'Montenegro', 'EUR', 1, 0),
(141, 'MF', 'Saint Martin', 'EUR', 1, 0),
(142, 'MG', 'Madagascar', 'MGA', 1, 0),
(143, 'MH', 'Marshall Islands', 'USD', 1, 0),
(144, 'MK', 'Macedonia', 'MKD', 1, 0),
(145, 'ML', 'Mali', 'XOF', 1, 0),
(146, 'MM', 'Myanmar [Burma]', 'MMK', 1, 0),
(147, 'MN', 'Mongolia', 'MNT', 1, 0),
(148, 'MO', 'Macao', 'MOP', 1, 0),
(149, 'MP', 'Northern Mariana Islands', 'USD', 1, 0),
(150, 'MQ', 'Martinique', 'EUR', 1, 0),
(151, 'MR', 'Mauritania', 'MRO', 1, 0),
(152, 'MS', 'Montserrat', 'XCD', 1, 0),
(153, 'MT', 'Malta', 'EUR', 1, 0),
(154, 'MU', 'Mauritius', 'MUR', 1, 0),
(155, 'MV', 'Maldives', 'MVR', 1, 0),
(156, 'MW', 'Malawi', 'MWK', 1, 0),
(157, 'MX', 'Mexico', 'MXN', 1, 0),
(158, 'MY', 'Malaysia', 'MYR', 1, 0),
(159, 'MZ', 'Mozambique', 'MZN', 1, 0),
(160, 'NA', 'Namibia', 'NAD', 1, 0),
(161, 'NC', 'New Caledonia', 'XPF', 1, 0),
(162, 'NE', 'Niger', 'XOF', 1, 0),
(163, 'NF', 'Norfolk Island', 'AUD', 1, 0),
(164, 'NG', 'Nigeria', 'NGN', 1, 0),
(165, 'NI', 'Nicaragua', 'NIO', 1, 0),
(166, 'NL', 'Netherlands', 'EUR', 1, 0),
(167, 'NO', 'Norway', 'NOK', 1, 0),
(168, 'NP', 'Nepal', 'NPR', 1, 0),
(169, 'NR', 'Nauru', 'AUD', 1, 0),
(170, 'NU', 'Niue', 'NZD', 1, 0),
(171, 'NZ', 'New Zealand', 'NZD', 1, 0),
(172, 'OM', 'Oman', 'OMR', 1, 0),
(173, 'PA', 'Panama', 'PAB', 1, 0),
(174, 'PE', 'Peru', 'PEN', 1, 0),
(175, 'PF', 'French Polynesia', 'XPF', 1, 0),
(176, 'PG', 'Papua New Guinea', 'PGK', 1, 0),
(177, 'PH', 'Philippines', 'PHP', 1, 0),
(178, 'PK', 'Pakistan', 'PKR', 1, 0),
(179, 'PL', 'Poland', 'PLN', 1, 0),
(180, 'PM', 'Saint Pierre and Miquelon', 'EUR', 1, 0),
(181, 'PN', 'Pitcairn Islands', 'NZD', 1, 0),
(182, 'PR', 'Puerto Rico', 'USD', 1, 0),
(183, 'PS', 'Palestine', 'ILS', 1, 0),
(184, 'PT', 'Portugal', 'EUR', 1, 0),
(185, 'PW', 'Palau', 'USD', 1, 0),
(186, 'PY', 'Paraguay', 'PYG', 1, 0),
(187, 'QA', 'Qatar', 'QAR', 1, 0),
(188, 'RE', 'Réunion', 'EUR', 1, 0),
(189, 'RO', 'Romania', 'RON', 1, 0),
(190, 'RS', 'Serbia', 'RSD', 1, 0),
(191, 'RU', 'Russia', 'RUB', 1, 0),
(192, 'RW', 'Rwanda', 'RWF', 1, 0),
(193, 'SA', 'Saudi Arabia', 'SAR', 1, 0),
(194, 'SB', 'Solomon Islands', 'SBD', 1, 0),
(195, 'SC', 'Seychelles', 'SCR', 1, 0),
(196, 'SD', 'Sudan', 'SDG', 1, 0),
(197, 'SE', 'Sweden', 'SEK', 1, 0),
(198, 'SG', 'Singapore', 'SGD', 1, 0),
(199, 'SH', 'Saint Helena', 'SHP', 1, 0),
(200, 'SI', 'Slovenia', 'EUR', 1, 0),
(201, 'SJ', 'Svalbard and Jan Mayen', 'NOK', 1, 0),
(202, 'SK', 'Slovakia', 'EUR', 1, 0),
(203, 'SL', 'Sierra Leone', 'SLL', 1, 0),
(204, 'SM', 'San Marino', 'EUR', 1, 0),
(205, 'SN', 'Senegal', 'XOF', 1, 0),
(206, 'SO', 'Somalia', 'SOS', 1, 0),
(207, 'SR', 'Suriname', 'SRD', 1, 0),
(208, 'SS', 'South Sudan', 'SSP', 1, 0),
(209, 'ST', 'São Tomé and Príncipe', 'STD', 1, 0),
(210, 'SV', 'El Salvador', 'USD', 1, 0),
(211, 'SX', 'Sint Maarten', 'ANG', 1, 0),
(212, 'SY', 'Syria', 'SYP', 1, 0),
(213, 'SZ', 'Swaziland', 'SZL', 1, 0),
(214, 'TC', 'Turks and Caicos Islands', 'USD', 1, 0),
(215, 'TD', 'Chad', 'XAF', 1, 0),
(216, 'TF', 'French Southern Territories', 'EUR', 1, 0),
(217, 'TG', 'Togo', 'XOF', 1, 0),
(218, 'TH', 'Thailand', 'THB', 1, 0),
(219, 'TJ', 'Tajikistan', 'TJS', 1, 0),
(220, 'TK', 'Tokelau', 'NZD', 1, 0),
(221, 'TL', 'East Timor', 'USD', 1, 0),
(222, 'TM', 'Turkmenistan', 'TMT', 1, 0),
(223, 'TN', 'Tunisia', 'TND', 1, 0),
(224, 'TO', 'Tonga', 'TOP', 1, 0),
(225, 'TR', 'Turkey', 'TRY', 1, 0),
(226, 'TT', 'Trinidad and Tobago', 'TTD', 1, 0),
(227, 'TV', 'Tuvalu', 'AUD', 1, 0),
(228, 'TW', 'Taiwan', 'TWD', 1, 0),
(229, 'TZ', 'Tanzania', 'TZS', 1, 0),
(230, 'UA', 'Ukraine', 'UAH', 1, 0),
(231, 'UG', 'Uganda', 'UGX', 1, 0),
(232, 'UM', 'U.S. Minor Outlying Islands', 'USD', 1, 0),
(233, 'US', 'United States', 'USD', 1, 0),
(234, 'UY', 'Uruguay', 'UYU', 1, 0),
(235, 'UZ', 'Uzbekistan', 'UZS', 1, 0),
(236, 'VA', 'Vatican City', 'EUR', 1, 0),
(237, 'VC', 'Saint Vincent and the Grenadines', 'XCD', 1, 0),
(238, 'VE', 'Venezuela', 'VEF', 1, 0),
(239, 'VG', 'British Virgin Islands', 'USD', 1, 0),
(240, 'VI', 'U.S. Virgin Islands', 'USD', 1, 0),
(241, 'VN', 'Vietnam', 'VND', 1, 0),
(242, 'VU', 'Vanuatu', 'VUV', 1, 0),
(243, 'WF', 'Wallis and Futuna', 'XPF', 1, 0),
(244, 'WS', 'Samoa', 'WST', 1, 0),
(245, 'XK', 'Kosovo', 'EUR', 1, 0),
(246, 'YE', 'Yemen', 'YER', 1, 0),
(247, 'YT', 'Mayotte', 'EUR', 1, 0),
(248, 'ZA', 'South Africa', 'ZAR', 1, 0),
(249, 'ZM', 'Zambia', 'ZMW', 1, 0),
(250, 'ZW', 'Zimbabwe', 'ZWL', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `amount`, `description`, `status`, `created`, `modified`) VALUES
(1, 'WRIST5', 5.00, '<p>Use WRIST5 to get $5 off on your transaction.</p>', 1, '2015-04-20 11:14:04', '2015-04-20 06:24:02'),
(2, 'DEBOSS7', 7.00, '<p>Use WRIST7 to get $7 off on your transaction.</p>', 1, '2015-04-20 11:53:44', '2015-04-20 06:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `creditcard_transactions`
--

CREATE TABLE IF NOT EXISTS `creditcard_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authorization_code` varchar(50) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `avs_response` varchar(20) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `cavv_response` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `creditcard_transactions`
--

INSERT INTO `creditcard_transactions` (`id`, `authorization_code`, `transaction_id`, `avs_response`, `amount`, `cavv_response`, `created`, `updated`) VALUES
(1, 'MXGYO3', '2232237996', 'Y', 13.51, '2', '2015-04-20 18:42:22', '2015-04-20 13:12:23'),
(2, 'HNKNSM', '2232238028', 'Y', 13.51, '2', '2015-04-20 18:43:56', '2015-04-20 13:13:56'),
(3, 'LQSLCQ', '2232238041', 'Y', 13.51, '2', '2015-04-20 18:44:42', '2015-04-20 13:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `created` int(11) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `title`, `slug`, `subject`, `description`, `status`, `is_deleted`, `created`, `modified`) VALUES
(1, 'Contact', 'contact', 'Welcome Message', '<p>This is welcome test message.</p>', 1, 0, 1423552303, '2015-02-11 09:14:02'),
(2, 'Welcome', 'welcome', 'Welcome', '<p>Hi [USER_NAME]</p><p>Name- [NAME]</p><p>Email- [EMAIL]</p><p>Password- [PASSWORD]</p><p>You registation has been successfully</p>', 1, 0, 1423553152, '2015-02-10 08:58:00'),
(3, 'HI', 'login', 'LOGIN', '<p>hi this is a sample template</p>', 1, 0, 1423733695, '2015-02-16 04:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `extra_price_quantities`
--

CREATE TABLE IF NOT EXISTS `extra_price_quantities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `extra_price_quantities`
--

INSERT INTO `extra_price_quantities` (`id`, `product_category_id`, `name`, `value`, `status`, `is_deleted`, `created`, `updated`) VALUES
(1, 1, '1-19', 20, 1, 0, '2015-02-17 13:00:36', '2015-03-10 13:59:40'),
(2, 1, '20-49', 50, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:00:01'),
(3, 1, '50-74', 75, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:00:20'),
(4, 1, '75-99', 99, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:00:54'),
(5, 1, '100-199', 100, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:01:18'),
(6, 1, '200-299', 200, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:01:59'),
(7, 1, '300-499', 300, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:03:12'),
(8, 1, '500-999', 500, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:04:11'),
(9, 1, '1000-1999', 1000, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:04:16'),
(10, 1, '2000-4999', 5000, 1, 0, '2015-02-17 13:00:36', '2015-03-12 04:48:14'),
(11, 1, '5000+', 5001, 1, 0, '2015-02-17 13:00:36', '2015-03-12 04:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `fonts`
--

CREATE TABLE IF NOT EXISTS `fonts` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `fonts`
--

INSERT INTO `fonts` (`id`, `name`, `image`, `status`, `created`) VALUES
(4, 'tahoma', '3450042015-03-27Tahoma.ttf', 1, '2015-02-19 12:00:48'),
(5, 'east market', '2054372015-03-27EASTMARK.TTF', 1, '2015-02-19 14:45:58'),
(6, 'ringer', '3550962015-03-27Ringer_Regular.ttf', 1, '2015-02-19 14:46:41'),
(7, 'aavark cafe', '7334932015-03-27AARVC___.TTF', 1, '2015-02-19 14:48:53'),
(8, 'nikelodeon', '5525942015-03-27nickelodeon.ttf', 1, '2015-02-19 14:49:26'),
(9, 'art brush', '9559122015-03-27Artbrush.ttf', 1, '2015-02-19 14:49:50'),
(10, 'arial bold', '4897462015-03-27arialbd.ttf', 1, '2015-02-19 14:50:22'),
(11, 'Arial Black Bold', '2248842015-03-27arial-black-bold.ttf', 1, '2015-03-27 10:48:15'),
(12, 'Use Custom Font', '1470162015-03-274897462015-03-27arialbd.ttf', 1, '2015-03-27 16:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `image`, `is_active`, `is_deleted`) VALUES
(1, 'img one', 'GAL44620373.png', 1, 0),
(2, 'img two', 'GAL44726634.png', 1, 0),
(3, 'img three', 'GAL41439978.png', 1, 0),
(4, 'img four', 'GAL3203929.png', 1, 0),
(5, 'img five', 'GAL7034184.png', 1, 0),
(6, 'img six', 'GAL14539781.png', 1, 0),
(7, 'img seven', 'GAL58992962.png', 1, 0),
(8, 'img eight', 'GAL98033221.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `meta_days`
--

CREATE TABLE IF NOT EXISTS `meta_days` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `days` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `meta_days`
--

INSERT INTO `meta_days` (`id`, `name`, `days`) VALUES
(1, '1 Day', 1),
(2, '2 Days', 2),
(3, '4 Days', 4),
(4, '6 Days', 6),
(5, 'International Shipping', 7);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '',
  `value` longtext NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `option_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `value`, `status`, `is_deleted`, `modified`) VALUES
(1, 'name', 'value', 1, 0, '2015-02-16 05:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_category_id` int(4) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_size_id` int(11) NOT NULL,
  `product_style_id` int(11) DEFAULT NULL,
  `ord_date` date DEFAULT NULL,
  `ord_time` time DEFAULT NULL,
  `client_ip` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(150) DEFAULT NULL,
  `front_msg` text,
  `front_msg_price` float(12,2) DEFAULT NULL,
  `back_msg` text,
  `back_msg_price` float(12,2) DEFAULT NULL,
  `intr_msg` text,
  `intr_msg_price` float(12,2) DEFAULT NULL,
  `bandsize` varchar(50) DEFAULT NULL,
  `front_start_clip` varchar(150) DEFAULT NULL,
  `front_end_clip` varchar(150) DEFAULT NULL,
  `back_start_clip` varchar(150) DEFAULT NULL,
  `back_end_clip` varchar(150) DEFAULT NULL,
  `intr_start_clip` varchar(150) DEFAULT NULL,
  `intr_end_clip` varchar(150) DEFAULT NULL,
  `clipart_per_price` float(12,2) DEFAULT NULL,
  `keychain` varchar(3) DEFAULT NULL,
  `keychain_price` float(12,2) DEFAULT NULL,
  `individually_bagged` varchar(3) DEFAULT NULL,
  `Individually_bagged_price` float(12,2) DEFAULT NULL,
  `made` varchar(100) DEFAULT NULL,
  `made_price` float(12,2) DEFAULT NULL,
  `production_time` int(4) DEFAULT NULL,
  `production_time_price` float(12,2) DEFAULT NULL,
  `shipping_time` int(4) DEFAULT NULL,
  `shipping_time_price` float(12,2) DEFAULT NULL,
  `total_qty` bigint(8) DEFAULT NULL,
  `per_price` float(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_category_id`, `product_id`, `product_size_id`, `product_style_id`, `ord_date`, `ord_time`, `client_ip`, `user_id`, `session_id`, `front_msg`, `front_msg_price`, `back_msg`, `back_msg_price`, `intr_msg`, `intr_msg_price`, `bandsize`, `front_start_clip`, `front_end_clip`, `back_start_clip`, `back_end_clip`, `intr_start_clip`, `intr_end_clip`, `clipart_per_price`, `keychain`, `keychain_price`, `individually_bagged`, `Individually_bagged_price`, `made`, `made_price`, `production_time`, `production_time_price`, `shipping_time`, `shipping_time_price`, `total_qty`, `per_price`) VALUES
(1, 1, 3, 1, 1, '2015-02-12', NULL, '103.230.152.50', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_dummies`
--

CREATE TABLE IF NOT EXISTS `order_dummies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `cc_pp_id` int(11) NOT NULL COMMENT 'Paypal Or Creditcard ID',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `order_dummies`
--

INSERT INTO `order_dummies` (`id`, `user_id`, `order_id`, `payment_method`, `cc_pp_id`, `created`, `modified`) VALUES
(1, 4, 'ODljpDuuBqVCvql3gb1y', '', 0, '2015-04-15 18:34:50', '2015-04-15 13:04:50'),
(2, 4, 'ODIlOmTjYYb2KdLMQoqO', '', 0, '2015-04-16 09:36:57', '2015-04-16 04:06:57'),
(3, 4, 'ODkp6oLf4nbr6lDKNoh4', '', 0, '2015-04-16 12:05:21', '2015-04-16 06:35:21'),
(4, 4, 'ODg6UMhdRpfqpz8wuxZ6', '', 0, '2015-04-16 12:15:21', '2015-04-16 06:45:21'),
(5, 4, 'ODAvYkxzZUVnOdKM2bE0', '', 0, '2015-04-16 12:18:56', '2015-04-16 06:48:56'),
(6, 4, 'ODU8TNTWHQPatayjAvjU', '', 0, '2015-04-16 12:20:35', '2015-04-16 06:50:35'),
(7, 4, 'ODVJFClRHTFlnpGaTLfR', '', 0, '2015-04-16 12:21:58', '2015-04-16 06:51:58'),
(8, 4, 'ODb8dDsxVHUIC2lkFWSU', '', 0, '2015-04-16 12:30:01', '2015-04-16 07:00:01'),
(9, 4, 'ODQkpkcqqha6uvHVeRf7', '', 0, '2015-04-16 12:31:01', '2015-04-16 07:01:01'),
(10, 4, 'ODTDYsLDteXvXaaZCs0I', '', 0, '2015-04-16 12:31:47', '2015-04-16 07:01:47'),
(11, 4, 'ODiIttLjYvQyjJYl9TjE', '', 0, '2015-04-16 12:36:02', '2015-04-16 07:06:02'),
(12, 4, 'ODSKSo9VvoMsKwz7NRzV', '', 0, '2015-04-16 14:13:28', '2015-04-16 08:43:28'),
(13, 4, 'ODKCF750hg9SJpXVH8ER', 'pp', 0, '2015-04-16 16:54:01', '2015-04-16 11:24:01'),
(14, 4, 'ODqxwIxKffKSOHdKKU6m', 'cc', 0, '2015-04-17 18:08:11', '2015-04-17 12:38:11'),
(15, 4, 'ODoY78UgfIMVteyx154Z', 'cc', 0, '2015-04-17 18:08:29', '2015-04-17 12:38:29'),
(16, 4, 'ODmQpPTIg2tMQe4SQjYm', 'cc', 0, '2015-04-17 18:08:34', '2015-04-17 12:38:34'),
(17, 4, 'ODNgqb1DDznefiGhZ4LM', 'cc', 0, '2015-04-17 18:09:29', '2015-04-17 12:39:29'),
(18, 4, 'ODXD0iNhckw53NXdgkVY', 'cc', 1, '2015-04-20 18:42:21', '2015-04-20 13:12:23'),
(19, 4, 'ODAH0roQ7Yq1ICEROfD9', 'cc', 2, '2015-04-20 18:43:55', '2015-04-20 13:13:56'),
(20, 4, 'ODQiTvt43EIaRl5QLLV1', 'cc', 3, '2015-04-20 18:44:41', '2015-04-20 13:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `order_dummy_details`
--

CREATE TABLE IF NOT EXISTS `order_dummy_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `category_img` varchar(50) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `style` varchar(50) NOT NULL,
  `style_id` tinyint(4) NOT NULL,
  `size` varchar(50) NOT NULL,
  `size_id` int(4) NOT NULL,
  `front_msg` varchar(100) NOT NULL,
  `internal_msg` varchar(100) NOT NULL,
  `back_msg` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `font_name` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `font_color` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `production_time` varchar(100) NOT NULL,
  `shipping_time` varchar(100) NOT NULL,
  `delivery_date` varchar(100) NOT NULL,
  `proof` varchar(100) NOT NULL,
  `wrapper` varchar(20) NOT NULL,
  `keychain` varchar(20) NOT NULL,
  `custom_band` varchar(50) NOT NULL,
  `msg_style` varchar(50) NOT NULL,
  `fs_logo` varchar(50) NOT NULL,
  `fe_logo` varchar(50) NOT NULL,
  `bs_logo` varchar(50) NOT NULL,
  `be_logo` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `extra_qty` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `order_dummy_details`
--

INSERT INTO `order_dummy_details` (`id`, `order_id`, `category`, `category_img`, `category_id`, `style`, `style_id`, `size`, `size_id`, `front_msg`, `internal_msg`, `back_msg`, `comment`, `font_name`, `color`, `font_color`, `qty`, `price`, `production_time`, `shipping_time`, `delivery_date`, `proof`, `wrapper`, `keychain`, `custom_band`, `msg_style`, `fs_logo`, `fe_logo`, `bs_logo`, `be_logo`, `product`, `extra_qty`) VALUES
(1, 'ODljpDuuBqVCvql3gb1y', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Red[6A])', '', 6, 27.11, '2 Days ($17.89)', '4 Days ($6.94)', 'April 23, 2015', 'No', 'No', '', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(2, 'ODIlOmTjYYb2KdLMQoqO', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Red[5A])', '', 5, 26.73, '2 Days ($17.89)', '4 Days ($6.94)', 'April 24, 2015', 'No', 'No', '', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(3, 'ODkp6oLf4nbr6lDKNoh4', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Red[5A])', '', 5, 26.73, '2 Days ($17.89)', '4 Days ($6.94)', 'April 24, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(4, 'ODg6UMhdRpfqpz8wuxZ6', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Red[5A])', '', 5, 26.73, '2 Days ($17.89)', '4 Days ($6.94)', 'April 24, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(5, 'ODAvYkxzZUVnOdKM2bE0', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Red[5A])', '', 5, 26.73, '2 Days ($17.89)', '4 Days ($6.94)', 'April 24, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(6, 'ODU8TNTWHQPatayjAvjU', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Red[5A])', '', 5, 26.73, '2 Days ($17.89)', '4 Days ($6.94)', 'April 24, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(7, 'ODVJFClRHTFlnpGaTLfR', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Red[5A])', '', 5, 26.73, '2 Days ($17.89)', '4 Days ($6.94)', 'April 24, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(8, 'ODb8dDsxVHUIC2lkFWSU', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Red[5A])', '', 5, 26.73, '2 Days ($17.89)', '4 Days ($6.94)', 'April 24, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(9, 'ODQkpkcqqha6uvHVeRf7', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Red[5A])', '', 5, 26.73, '2 Days ($17.89)', '4 Days ($6.94)', 'April 24, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(10, 'ODTDYsLDteXvXaaZCs0I', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Red[5A])', '', 5, 26.73, '2 Days ($17.89)', '4 Days ($6.94)', 'April 24, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(11, 'ODiIttLjYvQyjJYl9TjE', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Red[5A])', '', 5, 26.73, '2 Days ($17.89)', '4 Days ($6.94)', 'April 24, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(12, 'ODSKSo9VvoMsKwz7NRzV', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Red[34Y])', '', 34, 78.89, '2 Days ($17.89)', '4 Days ($6.94)', 'April 24, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(13, 'ODKCF750hg9SJpXVH8ER', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Red[12Y]) (Green[3Y])', '', 15, 37.83, '2 Days ($17.89)', '4 Days ($6.94)', 'April 24, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(14, 'ODqxwIxKffKSOHdKKU6m', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Green[20Y])', '', 20, 54.38, '2 Days ($17.89)', '6 Days ($4.69)', 'April 29, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(15, 'ODoY78UgfIMVteyx154Z', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Green[20Y])', '', 20, 54.38, '2 Days ($17.89)', '6 Days ($4.69)', 'April 29, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(16, 'ODmQpPTIg2tMQe4SQjYm', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Green[20Y])', '', 20, 54.38, '2 Days ($17.89)', '6 Days ($4.69)', 'April 29, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(17, 'ODNgqb1DDznefiGhZ4LM', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Green[20Y])', '', 20, 54.38, '2 Days ($17.89)', '6 Days ($4.69)', 'April 29, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', '', '', '', 'wristband', 0),
(18, 'ODXD0iNhckw53NXdgkVY', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Orange[6Y])', '', 6, 13.51, '4 Days ($1.89)', '4 Days ($6.94)', 'April 30, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', 'IMG85772079.png', '', '', 'wristband', 0),
(19, 'ODAH0roQ7Yq1ICEROfD9', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Orange[6Y])', '', 6, 13.51, '4 Days ($1.89)', '4 Days ($6.94)', 'April 30, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', 'IMG85772079.png', '', '', 'wristband', 0),
(20, 'ODQiTvt43EIaRl5QLLV1', 'Debossed', 'prod3771232015-03-02.png', 3, 'Solid', 1, '1/2 Inch', 2, '', '', '', '', 'Arial bold', '(Orange[6Y])', '', 6, 13.51, '4 Days ($1.89)', '4 Days ($6.94)', 'April 30, 2015', 'No', 'No', 'No', 'prod3771232015-03-02.png', 'front_back', '', 'IMG85772079.png', '', '', 'wristband', 0);

-- --------------------------------------------------------

--
-- Table structure for table `other_prices`
--

CREATE TABLE IF NOT EXISTS `other_prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_size_id` int(11) NOT NULL,
  `product_style_id` int(11) NOT NULL,
  `quantity_id` int(11) NOT NULL,
  `front_msg_extra` float(12,2) NOT NULL,
  `internal_msg` float(12,2) NOT NULL,
  `internal_msg_extra` float(12,2) NOT NULL,
  `back_msg` float(12,2) NOT NULL,
  `back_msg_extra` float(12,2) NOT NULL,
  `logo` float(12,2) NOT NULL,
  `keychain` float(12,2) NOT NULL,
  `wrapper` float(12,2) NOT NULL,
  `thickness_2mm` float(12,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=502 ;

--
-- Dumping data for table `other_prices`
--

INSERT INTO `other_prices` (`id`, `product_category_id`, `product_id`, `product_size_id`, `product_style_id`, `quantity_id`, `front_msg_extra`, `internal_msg`, `internal_msg_extra`, `back_msg`, `back_msg_extra`, `logo`, `keychain`, `wrapper`, `thickness_2mm`, `is_active`, `is_deleted`) VALUES
(1, 1, 10, 5, 4, 8, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.82, 0.80, 1, 0),
(2, 1, 15, 6, 4, 9, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.91, 0.60, 1, 0),
(3, 1, 12, 5, 2, 4, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.19, 0.40, 1, 0),
(4, 1, 11, 4, 1, 10, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.80, 0.40, 1, 0),
(5, 1, 13, 4, 1, 5, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.62, 0.22, 1, 0),
(6, 1, 4, 1, 2, 12, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.62, 0.19, 1, 0),
(7, 1, 10, 3, 4, 7, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.21, 0.16, 1, 0),
(8, 1, 8, 4, 1, 6, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.93, 0.15, 1, 0),
(9, 1, 12, 3, 1, 4, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.29, 0.15, 1, 0),
(10, 1, 15, 1, 1, 1, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.38, 0.15, 1, 0),
(11, 1, 5, 2, 1, 7, 0.20, 0.13, 0.06, 0.89, 0.56, 0.40, 0.15, 0.91, 0.15, 1, 0),
(12, 1, 11, 3, 2, 9, 0.06, 0.06, 0.06, 0.57, 0.13, 0.21, 0.15, 0.60, 0.15, 1, 0),
(13, 1, 3, 6, 4, 2, 0.06, 0.20, 0.06, 0.54, 0.13, 0.21, 0.15, 0.19, 0.15, 1, 0),
(14, 1, 3, 5, 1, 6, 0.02, 0.20, 0.06, 0.49, 0.02, 0.21, 0.15, 0.85, 0.15, 1, 0),
(15, 1, 11, 6, 4, 2, 0.02, 0.20, 0.02, 0.59, 0.02, 0.21, 0.15, 0.88, 0.15, 1, 0),
(16, 1, 14, 4, 1, 12, 0.02, 0.12, 0.07, 0.49, 0.02, 0.10, 0.15, 0.86, 0.15, 1, 0),
(17, 1, 12, 5, 4, 4, 0.02, 0.08, 0.02, 0.40, 0.02, 0.07, 0.15, 0.65, 0.15, 1, 0),
(18, 1, 12, 2, 2, 7, 0.02, 0.04, 0.02, 0.37, 0.02, 0.06, 0.15, 0.58, 0.15, 1, 0),
(19, 1, 12, 5, 4, 12, 0.03, 0.03, 0.03, 0.37, 0.02, 0.03, 0.15, 0.85, 0.15, 1, 0),
(20, 1, 8, 2, 2, 1, 0.02, 0.02, 0.02, 0.35, 0.02, 0.02, 0.15, 0.61, 0.15, 1, 0),
(21, 1, 13, 5, 1, 3, 0.20, 0.13, 0.06, 0.89, 0.56, 0.40, 0.15, 0.38, 0.15, 1, 0),
(22, 1, 8, 6, 2, 8, 0.06, 0.06, 0.06, 0.57, 0.13, 0.21, 0.15, 0.90, 0.15, 1, 0),
(23, 1, 3, 4, 1, 1, 0.06, 0.20, 0.06, 0.54, 0.13, 0.21, 0.15, 0.54, 0.15, 1, 0),
(24, 1, 14, 2, 2, 12, 0.02, 0.20, 0.06, 0.49, 0.02, 0.21, 0.15, 0.80, 0.15, 1, 0),
(25, 1, 14, 5, 1, 3, 0.02, 0.20, 0.02, 0.49, 0.02, 0.21, 0.15, 0.50, 0.15, 1, 0),
(26, 1, 14, 3, 2, 8, 0.02, 0.12, 0.07, 0.49, 0.02, 0.10, 0.15, 0.89, 0.15, 1, 0),
(27, 1, 5, 5, 2, 8, 0.02, 0.08, 0.02, 0.43, 0.02, 0.07, 0.15, 0.15, 0.15, 1, 0),
(28, 1, 14, 5, 4, 2, 0.02, 0.04, 0.02, 0.40, 0.02, 0.06, 0.15, 0.67, 0.15, 1, 0),
(29, 1, 8, 1, 4, 1, 0.03, 0.03, 0.03, 0.40, 0.02, 0.03, 0.15, 0.12, 0.15, 1, 0),
(30, 1, 5, 4, 1, 8, 0.02, 0.02, 0.02, 0.40, 0.02, 0.02, 0.15, 0.27, 0.15, 1, 0),
(31, 1, 14, 4, 1, 3, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.89, 0.80, 1, 0),
(32, 1, 8, 1, 4, 2, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.86, 0.60, 1, 0),
(33, 1, 4, 4, 1, 3, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.60, 0.40, 1, 0),
(34, 1, 4, 2, 4, 11, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.33, 0.40, 1, 0),
(35, 1, 8, 4, 2, 2, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.65, 0.22, 1, 0),
(36, 1, 4, 1, 2, 6, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.35, 0.19, 1, 0),
(37, 1, 11, 2, 4, 11, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.62, 0.16, 1, 0),
(38, 1, 15, 4, 2, 8, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.13, 0.15, 1, 0),
(39, 1, 12, 5, 4, 10, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.49, 0.15, 1, 0),
(40, 1, 8, 4, 2, 3, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.16, 0.15, 1, 0),
(41, 1, 3, 5, 2, 2, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.13, 0.80, 1, 0),
(42, 1, 13, 4, 2, 12, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.99, 0.60, 1, 0),
(43, 1, 12, 4, 4, 11, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.83, 0.40, 1, 0),
(44, 1, 14, 3, 4, 5, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.18, 0.40, 1, 0),
(45, 1, 15, 1, 2, 11, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.13, 0.22, 1, 0),
(46, 1, 13, 5, 1, 2, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.92, 0.19, 1, 0),
(47, 1, 11, 6, 2, 1, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.48, 0.16, 1, 0),
(48, 1, 11, 5, 2, 3, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.46, 0.15, 1, 0),
(49, 1, 13, 1, 2, 7, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.74, 0.15, 1, 0),
(50, 1, 11, 5, 2, 9, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.45, 0.15, 1, 0),
(51, 1, 4, 5, 1, 4, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.81, 0.80, 1, 0),
(52, 1, 5, 6, 4, 10, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.80, 0.60, 1, 0),
(53, 1, 8, 4, 4, 10, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.59, 0.40, 1, 0),
(54, 1, 10, 6, 4, 9, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.44, 0.40, 1, 0),
(55, 1, 4, 2, 4, 9, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.31, 0.22, 1, 0),
(56, 1, 12, 4, 1, 2, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.15, 0.19, 1, 0),
(57, 1, 13, 2, 4, 4, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.63, 0.16, 1, 0),
(58, 1, 14, 2, 4, 9, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.79, 0.15, 1, 0),
(59, 1, 10, 3, 2, 7, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.14, 0.15, 1, 0),
(60, 1, 14, 1, 1, 3, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.96, 0.15, 1, 0),
(61, 1, 15, 6, 4, 3, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.65, 0.80, 1, 0),
(62, 1, 14, 1, 4, 9, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.28, 0.60, 1, 0),
(63, 1, 3, 2, 2, 9, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.23, 0.40, 1, 0),
(64, 1, 10, 1, 2, 6, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.23, 0.40, 1, 0),
(65, 1, 3, 3, 1, 8, 0.02, 0.20, 0.07, 0.08, 0.02, 0.21, 0.32, 0.36, 0.22, 1, 0),
(66, 1, 13, 4, 4, 5, 0.02, 0.19, 0.07, 0.07, 0.02, 0.15, 0.25, 0.99, 0.19, 1, 0),
(67, 1, 10, 4, 4, 3, 0.02, 0.12, 0.02, 0.05, 0.02, 0.09, 0.20, 0.20, 0.16, 1, 0),
(68, 1, 4, 2, 4, 10, 0.01, 0.06, 0.02, 0.02, 0.01, 0.06, 0.15, 0.60, 0.15, 1, 0),
(69, 1, 4, 5, 4, 2, 0.01, 0.04, 0.03, 0.02, 0.01, 0.03, 0.15, 0.51, 0.15, 1, 0),
(70, 1, 11, 1, 4, 8, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.65, 0.15, 1, 0),
(71, 1, 5, 6, 4, 11, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.73, 0.80, 1, 0),
(72, 1, 5, 2, 4, 2, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.69, 0.60, 1, 0),
(73, 1, 8, 4, 4, 10, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.26, 0.40, 1, 0),
(74, 1, 3, 3, 2, 5, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.93, 0.40, 1, 0),
(75, 1, 11, 6, 2, 6, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.18, 0.22, 1, 0),
(76, 1, 12, 6, 4, 11, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.70, 0.19, 1, 0),
(77, 1, 14, 1, 4, 8, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.17, 0.16, 1, 0),
(78, 1, 15, 3, 1, 1, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.42, 0.15, 1, 0),
(79, 1, 8, 6, 1, 5, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.62, 0.15, 1, 0),
(80, 1, 3, 3, 2, 10, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.85, 0.15, 1, 0),
(81, 1, 13, 5, 4, 7, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.47, 0.80, 1, 0),
(82, 1, 3, 6, 1, 5, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.60, 0.60, 1, 0),
(83, 1, 15, 3, 4, 6, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.59, 0.40, 1, 0),
(84, 1, 13, 6, 2, 2, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.17, 0.40, 1, 0),
(85, 1, 13, 2, 2, 4, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.78, 0.22, 1, 0),
(86, 1, 12, 6, 4, 7, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.57, 0.19, 1, 0),
(87, 1, 4, 1, 1, 6, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.41, 0.16, 1, 0),
(88, 1, 13, 6, 4, 8, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.26, 0.15, 1, 0),
(89, 1, 11, 5, 4, 7, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.85, 0.15, 1, 0),
(90, 1, 12, 1, 2, 8, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.66, 0.15, 1, 0),
(91, 1, 11, 2, 1, 6, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.65, 0.80, 1, 0),
(92, 1, 11, 1, 1, 4, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.29, 0.60, 1, 0),
(93, 1, 10, 1, 4, 6, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.28, 0.40, 1, 0),
(94, 1, 4, 6, 1, 2, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.46, 0.40, 1, 0),
(95, 1, 11, 1, 4, 6, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.44, 0.22, 1, 0),
(96, 1, 4, 5, 4, 3, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.71, 0.19, 1, 0),
(97, 1, 11, 3, 1, 9, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.34, 0.16, 1, 0),
(98, 1, 10, 2, 2, 3, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.36, 0.15, 1, 0),
(99, 1, 15, 3, 4, 2, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.68, 0.15, 1, 0),
(100, 1, 15, 2, 2, 9, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.43, 0.15, 1, 0),
(101, 1, 4, 6, 2, 3, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.91, 0.80, 1, 0),
(102, 1, 5, 6, 1, 5, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.48, 0.60, 1, 0),
(103, 1, 14, 3, 2, 10, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.44, 0.40, 1, 0),
(104, 1, 11, 5, 4, 8, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.67, 0.40, 1, 0),
(105, 1, 4, 1, 4, 10, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.15, 0.22, 1, 0),
(106, 1, 5, 4, 2, 2, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.42, 0.19, 1, 0),
(107, 1, 4, 5, 1, 7, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.65, 0.16, 1, 0),
(108, 1, 10, 3, 4, 6, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.98, 0.15, 1, 0),
(109, 1, 10, 6, 1, 3, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.16, 0.15, 1, 0),
(110, 1, 3, 3, 1, 12, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.48, 0.15, 1, 0),
(111, 1, 10, 4, 4, 7, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.90, 0.80, 1, 0),
(112, 1, 3, 5, 1, 6, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.28, 0.60, 1, 0),
(113, 1, 4, 2, 2, 5, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.37, 0.40, 1, 0),
(114, 1, 13, 4, 4, 8, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.92, 0.40, 1, 0),
(115, 1, 11, 1, 1, 7, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.67, 0.22, 1, 0),
(116, 1, 11, 6, 1, 2, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.51, 0.19, 1, 0),
(117, 1, 14, 5, 1, 1, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.44, 0.16, 1, 0),
(118, 1, 12, 2, 2, 2, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.55, 0.15, 1, 0),
(119, 1, 12, 5, 2, 8, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.43, 0.15, 1, 0),
(120, 1, 5, 6, 2, 3, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.40, 0.15, 1, 0),
(121, 1, 13, 3, 4, 8, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.60, 0.80, 1, 0),
(122, 1, 11, 3, 1, 11, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.82, 0.60, 1, 0),
(123, 1, 10, 1, 4, 5, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.38, 0.40, 1, 0),
(124, 1, 8, 2, 2, 5, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.25, 0.40, 1, 0),
(125, 1, 13, 3, 1, 10, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.90, 0.22, 1, 0),
(126, 1, 3, 5, 2, 6, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.94, 0.19, 1, 0),
(127, 1, 8, 1, 1, 10, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 1.00, 0.16, 1, 0),
(128, 1, 10, 4, 1, 9, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.29, 0.15, 1, 0),
(129, 1, 3, 5, 2, 3, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.14, 0.15, 1, 0),
(130, 1, 13, 5, 4, 3, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.64, 0.15, 1, 0),
(131, 1, 8, 6, 4, 7, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.87, 0.80, 1, 0),
(132, 1, 8, 2, 2, 8, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.52, 0.60, 1, 0),
(133, 1, 11, 3, 2, 1, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.81, 0.40, 1, 0),
(134, 1, 15, 1, 4, 12, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.57, 0.40, 1, 0),
(135, 1, 15, 1, 1, 11, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.35, 0.22, 1, 0),
(136, 1, 3, 4, 4, 2, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.83, 0.19, 1, 0),
(137, 1, 15, 5, 2, 11, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.28, 0.16, 1, 0),
(138, 1, 12, 5, 4, 1, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.62, 0.15, 1, 0),
(139, 1, 10, 1, 4, 9, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.35, 0.15, 1, 0),
(140, 1, 4, 5, 4, 4, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.69, 0.15, 1, 0),
(141, 1, 8, 4, 4, 4, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.52, 0.80, 1, 0),
(142, 1, 11, 1, 1, 3, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.44, 0.60, 1, 0),
(143, 1, 15, 5, 4, 9, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.51, 0.40, 1, 0),
(144, 1, 11, 3, 4, 10, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.24, 0.40, 1, 0),
(145, 1, 8, 4, 2, 1, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.46, 0.22, 1, 0),
(146, 1, 13, 5, 1, 2, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.59, 0.19, 1, 0),
(147, 1, 14, 1, 2, 12, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.57, 0.16, 1, 0),
(148, 1, 14, 3, 2, 10, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.97, 0.15, 1, 0),
(149, 1, 13, 2, 2, 12, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.34, 0.15, 1, 0),
(150, 1, 3, 5, 4, 11, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.50, 0.15, 1, 0),
(151, 1, 3, 6, 1, 9, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.48, 0.80, 1, 0),
(152, 1, 5, 5, 2, 2, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.78, 0.60, 1, 0),
(153, 1, 5, 3, 4, 2, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.57, 0.40, 1, 0),
(154, 1, 12, 5, 1, 4, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.39, 0.40, 1, 0),
(155, 1, 5, 3, 4, 3, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.17, 0.22, 1, 0),
(156, 1, 10, 6, 1, 12, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.47, 0.19, 1, 0),
(157, 1, 5, 1, 2, 1, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.85, 0.16, 1, 0),
(158, 1, 15, 3, 2, 2, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.93, 0.15, 1, 0),
(159, 1, 8, 6, 2, 11, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.20, 0.15, 1, 0),
(160, 1, 5, 2, 1, 6, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.79, 0.15, 1, 0),
(161, 1, 10, 4, 1, 8, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.57, 0.80, 1, 0),
(162, 1, 8, 2, 4, 2, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.40, 0.60, 1, 0),
(163, 1, 3, 3, 4, 6, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.16, 0.40, 1, 0),
(164, 1, 13, 5, 2, 10, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.41, 0.40, 1, 0),
(165, 1, 5, 3, 1, 4, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.55, 0.22, 1, 0),
(166, 1, 12, 4, 4, 6, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.53, 0.19, 1, 0),
(167, 1, 13, 3, 4, 3, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.91, 0.16, 1, 0),
(168, 1, 4, 3, 2, 5, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.16, 0.15, 1, 0),
(169, 1, 13, 5, 1, 8, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.67, 0.15, 1, 0),
(170, 1, 15, 1, 2, 3, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.97, 0.15, 1, 0),
(171, 1, 5, 1, 1, 6, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.92, 0.80, 1, 0),
(172, 1, 13, 3, 2, 2, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.69, 0.60, 1, 0),
(173, 1, 12, 6, 4, 10, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.62, 0.40, 1, 0),
(174, 1, 14, 4, 2, 11, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.91, 0.40, 1, 0),
(175, 1, 13, 5, 1, 10, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.79, 0.22, 1, 0),
(176, 1, 15, 3, 1, 5, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.21, 0.19, 1, 0),
(177, 1, 8, 5, 2, 11, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.37, 0.16, 1, 0),
(178, 1, 11, 3, 1, 1, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.24, 0.15, 1, 0),
(179, 1, 15, 5, 4, 9, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.89, 0.15, 1, 0),
(180, 1, 14, 4, 2, 8, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.91, 0.15, 1, 0),
(181, 1, 12, 5, 4, 2, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.89, 0.80, 1, 0),
(182, 1, 13, 1, 4, 6, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.72, 0.60, 1, 0),
(183, 1, 4, 1, 1, 3, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.82, 0.40, 1, 0),
(184, 1, 10, 3, 2, 7, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.95, 0.40, 1, 0),
(185, 1, 4, 1, 4, 2, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.38, 0.22, 1, 0),
(186, 1, 5, 1, 2, 7, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.77, 0.19, 1, 0),
(187, 1, 5, 3, 2, 6, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.81, 0.16, 1, 0),
(188, 1, 14, 2, 2, 12, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.73, 0.15, 1, 0),
(189, 1, 12, 1, 1, 6, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.22, 0.15, 1, 0),
(190, 1, 3, 6, 4, 7, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.61, 0.15, 1, 0),
(191, 1, 14, 2, 2, 12, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.51, 0.80, 1, 0),
(192, 1, 13, 4, 1, 10, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.61, 0.60, 1, 0),
(193, 1, 12, 4, 4, 4, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.52, 0.40, 1, 0),
(194, 1, 10, 1, 4, 2, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.68, 0.40, 1, 0),
(195, 1, 3, 5, 4, 12, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.84, 0.22, 1, 0),
(196, 1, 11, 1, 1, 5, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.27, 0.19, 1, 0),
(197, 1, 11, 4, 1, 7, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.53, 0.16, 1, 0),
(198, 1, 10, 2, 2, 9, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.82, 0.15, 1, 0),
(199, 1, 10, 5, 4, 11, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.64, 0.15, 1, 0),
(200, 1, 8, 2, 1, 9, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.61, 0.15, 1, 0),
(201, 1, 13, 4, 2, 5, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.13, 0.80, 1, 0),
(202, 1, 5, 4, 4, 2, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.54, 0.60, 1, 0),
(203, 1, 15, 1, 4, 6, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.38, 0.40, 1, 0),
(204, 1, 14, 6, 1, 4, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.21, 0.40, 1, 0),
(205, 1, 10, 1, 1, 3, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.69, 0.22, 1, 0),
(206, 1, 8, 3, 2, 11, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.92, 0.19, 1, 0),
(207, 1, 5, 2, 1, 12, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.64, 0.16, 1, 0),
(208, 1, 3, 1, 1, 3, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.35, 0.15, 1, 0),
(209, 1, 10, 5, 4, 4, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.64, 0.15, 1, 0),
(210, 1, 8, 6, 4, 6, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.24, 0.15, 1, 0),
(211, 1, 13, 1, 1, 3, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.96, 0.80, 1, 0),
(212, 1, 5, 3, 2, 2, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.38, 0.60, 1, 0),
(213, 1, 14, 4, 1, 4, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.73, 0.40, 1, 0),
(214, 1, 3, 2, 2, 5, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.62, 0.40, 1, 0),
(215, 1, 5, 2, 4, 1, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.82, 0.22, 1, 0),
(216, 1, 14, 3, 2, 6, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.34, 0.19, 1, 0),
(217, 1, 15, 3, 4, 4, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.94, 0.16, 1, 0),
(218, 1, 3, 2, 4, 4, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.89, 0.15, 1, 0),
(219, 1, 8, 4, 2, 7, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.61, 0.15, 1, 0),
(220, 1, 8, 3, 2, 11, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.28, 0.15, 1, 0),
(221, 1, 13, 5, 1, 5, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.38, 0.80, 1, 0),
(222, 1, 10, 5, 1, 4, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.96, 0.60, 1, 0),
(223, 1, 4, 6, 1, 1, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.86, 0.40, 1, 0),
(224, 1, 10, 6, 1, 10, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.42, 0.40, 1, 0),
(225, 1, 12, 4, 2, 11, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.31, 0.22, 1, 0),
(226, 1, 4, 6, 2, 6, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.18, 0.19, 1, 0),
(227, 1, 13, 1, 1, 5, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.79, 0.16, 1, 0),
(228, 1, 14, 2, 4, 7, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.60, 0.15, 1, 0),
(229, 1, 10, 4, 2, 1, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.53, 0.15, 1, 0),
(230, 1, 11, 2, 1, 11, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.76, 0.15, 1, 0),
(231, 1, 4, 1, 1, 5, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.30, 0.80, 1, 0),
(232, 1, 12, 1, 2, 4, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.91, 0.60, 1, 0),
(233, 1, 13, 3, 2, 2, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.87, 0.40, 1, 0),
(234, 1, 5, 2, 2, 1, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.63, 0.40, 1, 0),
(235, 1, 8, 5, 1, 3, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.42, 0.22, 1, 0),
(236, 1, 8, 5, 2, 1, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.11, 0.19, 1, 0),
(237, 1, 13, 1, 2, 6, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.99, 0.16, 1, 0),
(238, 1, 10, 6, 1, 4, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.93, 0.15, 1, 0),
(239, 1, 8, 3, 2, 9, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.66, 0.15, 1, 0),
(240, 1, 5, 6, 2, 10, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.44, 0.15, 1, 0),
(241, 1, 4, 5, 1, 4, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.99, 0.80, 1, 0),
(242, 1, 8, 6, 4, 10, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.86, 0.60, 1, 0),
(243, 1, 14, 4, 2, 3, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.32, 0.40, 1, 0),
(244, 1, 11, 4, 1, 9, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.72, 0.40, 1, 0),
(245, 1, 11, 4, 4, 7, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.73, 0.22, 1, 0),
(246, 1, 15, 5, 4, 12, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.51, 0.19, 1, 0),
(247, 1, 10, 2, 1, 1, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.25, 0.16, 1, 0),
(248, 1, 3, 4, 1, 2, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.51, 0.15, 1, 0),
(249, 1, 10, 6, 1, 3, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.80, 0.15, 1, 0),
(250, 1, 13, 5, 1, 8, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.59, 0.15, 1, 0),
(251, 1, 13, 4, 2, 8, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.45, 0.80, 1, 0),
(252, 1, 8, 5, 1, 12, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.39, 0.60, 1, 0),
(253, 1, 5, 4, 1, 7, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.50, 0.40, 1, 0),
(254, 1, 8, 5, 2, 10, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.34, 0.40, 1, 0),
(255, 1, 15, 4, 4, 5, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.99, 0.22, 1, 0),
(256, 1, 12, 3, 1, 12, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.25, 0.19, 1, 0),
(257, 1, 14, 4, 4, 4, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.86, 0.16, 1, 0),
(258, 1, 5, 6, 2, 8, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.73, 0.15, 1, 0),
(259, 1, 15, 3, 4, 9, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.11, 0.15, 1, 0),
(260, 1, 13, 6, 1, 5, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.93, 0.15, 1, 0),
(261, 1, 5, 1, 4, 7, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.63, 0.80, 1, 0),
(262, 1, 15, 2, 2, 9, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.27, 0.60, 1, 0),
(263, 1, 8, 6, 4, 8, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.27, 0.40, 1, 0),
(264, 1, 3, 5, 2, 7, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.42, 0.40, 1, 0),
(265, 1, 12, 4, 4, 11, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.32, 0.22, 1, 0),
(266, 1, 12, 6, 1, 6, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.20, 0.19, 1, 0),
(267, 1, 11, 6, 2, 2, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.87, 0.16, 1, 0),
(268, 1, 8, 5, 1, 11, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.92, 0.15, 1, 0),
(269, 1, 13, 6, 1, 9, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.11, 0.15, 1, 0),
(270, 1, 4, 5, 4, 8, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.39, 0.15, 1, 0),
(271, 1, 3, 4, 2, 2, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.61, 0.80, 1, 0),
(272, 1, 3, 3, 2, 1, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.87, 0.60, 1, 0),
(273, 1, 13, 4, 4, 8, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.61, 0.40, 1, 0),
(274, 1, 4, 6, 2, 3, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.36, 0.40, 1, 0),
(275, 1, 10, 6, 2, 3, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.76, 0.22, 1, 0),
(276, 1, 13, 4, 4, 2, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.82, 0.19, 1, 0),
(277, 1, 5, 2, 1, 7, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.81, 0.16, 1, 0),
(278, 1, 10, 4, 2, 11, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.61, 0.15, 1, 0),
(279, 1, 8, 3, 2, 1, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.52, 0.15, 1, 0),
(280, 1, 3, 3, 4, 7, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.67, 0.15, 1, 0),
(281, 1, 15, 1, 2, 10, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.78, 0.80, 1, 0),
(282, 1, 11, 6, 2, 6, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.91, 0.60, 1, 0),
(283, 1, 8, 4, 4, 9, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.31, 0.40, 1, 0),
(284, 1, 15, 6, 2, 8, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.50, 0.40, 1, 0),
(285, 1, 5, 3, 2, 2, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.60, 0.22, 1, 0),
(286, 1, 13, 2, 4, 12, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.49, 0.19, 1, 0),
(287, 1, 3, 4, 2, 3, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.53, 0.16, 1, 0),
(288, 1, 3, 5, 1, 1, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.17, 0.15, 1, 0),
(289, 1, 11, 4, 1, 8, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.98, 0.15, 1, 0),
(290, 1, 4, 3, 2, 2, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.71, 0.15, 1, 0),
(291, 1, 5, 1, 1, 5, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.48, 0.80, 1, 0),
(292, 1, 10, 4, 4, 2, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.16, 0.60, 1, 0),
(293, 1, 8, 3, 2, 4, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.19, 0.40, 1, 0),
(294, 1, 15, 6, 2, 5, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.34, 0.40, 1, 0),
(295, 1, 10, 2, 1, 12, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.15, 0.22, 1, 0),
(296, 1, 13, 3, 1, 9, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.54, 0.19, 1, 0),
(297, 1, 4, 6, 1, 12, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.33, 0.16, 1, 0),
(298, 1, 3, 5, 1, 6, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.83, 0.15, 1, 0),
(299, 1, 10, 2, 4, 12, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.36, 0.15, 1, 0),
(300, 1, 4, 5, 4, 12, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.12, 0.15, 1, 0),
(301, 1, 12, 5, 2, 11, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.30, 0.80, 1, 0),
(302, 1, 5, 3, 1, 10, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.14, 0.60, 1, 0),
(303, 1, 12, 3, 2, 2, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.62, 0.40, 1, 0),
(304, 1, 5, 3, 2, 2, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.79, 0.40, 1, 0),
(305, 1, 4, 6, 1, 10, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.18, 0.22, 1, 0),
(306, 1, 8, 2, 4, 4, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.22, 0.19, 1, 0),
(307, 1, 8, 3, 2, 10, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.47, 0.16, 1, 0),
(308, 1, 13, 5, 1, 1, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.70, 0.15, 1, 0),
(309, 1, 12, 1, 4, 3, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.18, 0.15, 1, 0),
(310, 1, 11, 3, 2, 9, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.49, 0.15, 1, 0),
(311, 1, 3, 2, 1, 2, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.90, 0.80, 1, 0),
(312, 1, 8, 1, 1, 4, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.23, 0.60, 1, 0),
(313, 1, 13, 3, 2, 5, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.17, 0.40, 1, 0),
(314, 1, 5, 5, 4, 1, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.93, 0.40, 1, 0),
(315, 1, 15, 1, 4, 10, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.47, 0.22, 1, 0),
(316, 1, 11, 4, 4, 10, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.37, 0.19, 1, 0),
(317, 1, 4, 2, 2, 10, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.33, 0.16, 1, 0),
(318, 1, 12, 2, 4, 2, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.42, 0.15, 1, 0),
(319, 1, 5, 5, 4, 3, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.14, 0.15, 1, 0),
(320, 1, 3, 6, 2, 5, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.23, 0.15, 1, 0),
(321, 1, 10, 4, 1, 4, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.62, 0.80, 1, 0),
(322, 1, 5, 5, 2, 7, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.50, 0.60, 1, 0),
(323, 1, 15, 3, 2, 3, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.56, 0.40, 1, 0),
(324, 1, 14, 4, 4, 4, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.31, 0.40, 1, 0),
(325, 1, 12, 6, 1, 12, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.66, 0.22, 1, 0),
(326, 1, 3, 5, 1, 4, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.47, 0.19, 1, 0),
(327, 1, 4, 6, 2, 10, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.29, 0.16, 1, 0),
(328, 1, 5, 2, 1, 1, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.81, 0.15, 1, 0),
(329, 1, 14, 1, 4, 5, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.37, 0.15, 1, 0),
(330, 1, 12, 2, 4, 5, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.26, 0.15, 1, 0),
(331, 1, 12, 4, 2, 2, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.95, 0.80, 1, 0),
(332, 1, 12, 4, 1, 10, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.30, 0.60, 1, 0),
(333, 1, 4, 3, 2, 9, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.35, 0.40, 1, 0),
(334, 1, 15, 6, 2, 4, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.75, 0.40, 1, 0),
(335, 1, 14, 3, 2, 3, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.80, 0.22, 1, 0),
(336, 1, 10, 3, 1, 2, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.74, 0.19, 1, 0),
(337, 1, 4, 1, 2, 2, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.33, 0.16, 1, 0),
(338, 1, 10, 2, 1, 10, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.19, 0.15, 1, 0),
(339, 1, 11, 3, 4, 12, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.79, 0.15, 1, 0),
(340, 1, 14, 6, 1, 5, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.56, 0.15, 1, 0),
(341, 1, 3, 4, 1, 3, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.34, 0.80, 1, 0),
(342, 1, 10, 6, 4, 4, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.83, 0.60, 1, 0),
(343, 1, 11, 5, 4, 1, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.33, 0.40, 1, 0),
(344, 1, 14, 5, 2, 11, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.86, 0.40, 1, 0),
(345, 1, 4, 6, 4, 3, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.52, 0.22, 1, 0),
(346, 1, 4, 6, 4, 4, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.83, 0.19, 1, 0),
(347, 1, 8, 3, 1, 11, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.67, 0.16, 1, 0),
(348, 1, 12, 2, 4, 5, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.75, 0.15, 1, 0),
(349, 1, 15, 5, 1, 9, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.74, 0.15, 1, 0),
(350, 1, 10, 2, 4, 6, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.48, 0.15, 1, 0),
(351, 1, 15, 2, 2, 10, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.96, 0.80, 1, 0),
(352, 1, 12, 1, 2, 12, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.55, 0.60, 1, 0),
(353, 1, 10, 2, 4, 9, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.67, 0.40, 1, 0),
(354, 1, 5, 5, 1, 11, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.72, 0.40, 1, 0),
(355, 1, 5, 3, 1, 11, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.56, 0.22, 1, 0),
(356, 1, 8, 4, 1, 8, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.55, 0.19, 1, 0),
(357, 1, 12, 5, 4, 3, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.99, 0.16, 1, 0),
(358, 1, 11, 2, 2, 4, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.49, 0.15, 1, 0),
(359, 1, 3, 5, 1, 1, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.27, 0.15, 1, 0),
(360, 1, 5, 1, 2, 8, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.70, 0.15, 1, 0),
(361, 1, 15, 6, 4, 7, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.79, 0.80, 1, 0),
(362, 1, 8, 3, 2, 5, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.86, 0.60, 1, 0),
(363, 1, 8, 5, 2, 3, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.91, 0.40, 1, 0),
(364, 1, 3, 1, 1, 5, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.98, 0.40, 1, 0),
(365, 1, 8, 2, 1, 10, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.27, 0.22, 1, 0),
(366, 1, 14, 5, 1, 7, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.12, 0.19, 1, 0),
(367, 1, 11, 3, 1, 6, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.57, 0.16, 1, 0),
(368, 1, 4, 2, 2, 8, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.59, 0.15, 1, 0),
(369, 1, 5, 6, 4, 10, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.24, 0.15, 1, 0),
(370, 1, 10, 5, 4, 10, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.22, 0.15, 1, 0),
(371, 1, 11, 6, 2, 1, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.31, 0.80, 1, 0),
(372, 1, 5, 4, 1, 6, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.78, 0.60, 1, 0),
(373, 1, 13, 2, 1, 10, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.16, 0.40, 1, 0),
(374, 1, 5, 6, 4, 10, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.14, 0.40, 1, 0),
(375, 1, 12, 4, 4, 5, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.16, 0.22, 1, 0),
(376, 1, 12, 6, 1, 10, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.25, 0.19, 1, 0),
(377, 1, 8, 3, 2, 7, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.66, 0.16, 1, 0),
(378, 1, 12, 5, 4, 6, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.66, 0.15, 1, 0),
(379, 1, 10, 3, 1, 6, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.34, 0.15, 1, 0),
(380, 1, 13, 5, 4, 2, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.50, 0.15, 1, 0),
(381, 1, 11, 4, 2, 5, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.50, 0.80, 1, 0),
(382, 1, 12, 5, 4, 8, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.89, 0.60, 1, 0),
(383, 1, 4, 3, 4, 2, 0.06, 0.20, 0.06, 0.10, 0.13, 0.21, 0.40, 0.15, 0.40, 1, 0),
(384, 1, 4, 3, 2, 6, 0.02, 0.20, 0.06, 0.10, 0.04, 0.21, 0.40, 0.66, 0.40, 1, 0),
(385, 1, 4, 5, 2, 6, 0.02, 0.22, 0.07, 0.09, 0.04, 0.21, 0.22, 0.97, 0.22, 1, 0),
(386, 1, 5, 5, 2, 12, 0.02, 0.21, 0.07, 0.07, 0.04, 0.10, 0.19, 0.98, 0.19, 1, 0),
(387, 1, 13, 6, 4, 12, 0.02, 0.14, 0.02, 0.04, 0.02, 0.07, 0.15, 0.97, 0.16, 1, 0),
(388, 1, 8, 5, 1, 12, 0.01, 0.06, 0.02, 0.02, 0.01, 0.06, 0.15, 0.91, 0.15, 1, 0),
(389, 1, 15, 3, 2, 10, 0.01, 0.04, 0.03, 0.02, 0.01, 0.03, 0.15, 0.66, 0.15, 1, 0),
(390, 1, 11, 6, 4, 10, 0.01, 0.02, 0.01, 0.02, 0.01, 0.02, 0.15, 0.45, 0.15, 1, 0),
(391, 1, 12, 6, 4, 12, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.16, 0.80, 1, 0),
(392, 1, 11, 2, 4, 7, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.25, 0.60, 1, 0),
(393, 1, 15, 3, 2, 2, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.67, 0.40, 1, 0),
(394, 1, 13, 1, 4, 1, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.72, 0.40, 1, 0),
(395, 1, 11, 5, 1, 12, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.60, 0.22, 1, 0),
(396, 1, 14, 6, 4, 12, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.71, 0.19, 1, 0),
(397, 1, 10, 6, 4, 2, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.74, 0.16, 1, 0),
(398, 1, 12, 4, 2, 6, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.60, 0.15, 1, 0),
(399, 1, 8, 3, 1, 2, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.68, 0.15, 1, 0),
(400, 1, 8, 5, 1, 12, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.60, 0.15, 1, 0),
(401, 1, 15, 4, 2, 4, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.85, 0.80, 1, 0),
(402, 1, 8, 6, 1, 1, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.57, 0.60, 1, 0),
(403, 1, 13, 6, 1, 8, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.20, 0.40, 1, 0),
(404, 1, 11, 5, 1, 4, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.98, 0.40, 1, 0),
(405, 1, 5, 2, 2, 11, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.59, 0.22, 1, 0),
(406, 1, 3, 3, 2, 5, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.81, 0.19, 1, 0),
(407, 1, 8, 2, 1, 9, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.38, 0.16, 1, 0),
(408, 1, 12, 3, 4, 2, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.27, 0.15, 1, 0),
(409, 1, 11, 4, 2, 5, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.12, 0.15, 1, 0),
(410, 1, 13, 2, 1, 6, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.57, 0.15, 1, 0),
(411, 1, 13, 5, 1, 12, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.61, 0.80, 1, 0),
(412, 1, 4, 1, 2, 6, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.31, 0.60, 1, 0),
(413, 1, 8, 1, 1, 5, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.55, 0.40, 1, 0),
(414, 1, 10, 4, 4, 1, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.81, 0.40, 1, 0),
(415, 1, 14, 5, 4, 9, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.52, 0.22, 1, 0),
(416, 1, 3, 3, 2, 4, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.96, 0.19, 1, 0),
(417, 1, 3, 5, 1, 1, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.43, 0.16, 1, 0),
(418, 1, 15, 6, 2, 3, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.98, 0.15, 1, 0),
(419, 1, 5, 4, 4, 3, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.81, 0.15, 1, 0),
(420, 1, 12, 3, 2, 12, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.13, 0.15, 1, 0),
(421, 1, 5, 6, 1, 4, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.80, 0.80, 1, 0),
(422, 1, 3, 2, 2, 3, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.81, 0.60, 1, 0),
(423, 1, 12, 4, 1, 12, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.66, 0.40, 1, 0),
(424, 1, 12, 6, 4, 6, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.77, 0.40, 1, 0),
(425, 1, 11, 2, 4, 2, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.89, 0.22, 1, 0),
(426, 1, 13, 4, 4, 12, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.20, 0.19, 1, 0),
(427, 1, 10, 4, 1, 3, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.96, 0.16, 1, 0),
(428, 1, 3, 5, 4, 10, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.48, 0.15, 1, 0),
(429, 1, 13, 4, 2, 9, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.33, 0.15, 1, 0),
(430, 1, 11, 2, 2, 11, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 1.00, 0.15, 1, 0),
(431, 1, 8, 5, 1, 1, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.31, 0.80, 1, 0),
(432, 1, 11, 4, 4, 1, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.27, 0.60, 1, 0),
(433, 1, 12, 5, 1, 6, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.30, 0.40, 1, 0),
(434, 1, 14, 1, 1, 2, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.59, 0.40, 1, 0),
(435, 1, 11, 2, 4, 5, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.16, 0.22, 1, 0),
(436, 1, 10, 6, 1, 5, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.72, 0.19, 1, 0),
(437, 1, 3, 3, 2, 12, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.31, 0.16, 1, 0),
(438, 1, 3, 5, 2, 4, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.22, 0.15, 1, 0),
(439, 1, 11, 1, 2, 7, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.94, 0.15, 1, 0),
(440, 1, 13, 6, 2, 7, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.35, 0.15, 1, 0),
(441, 1, 11, 3, 4, 4, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.65, 0.80, 1, 0),
(442, 1, 8, 6, 2, 5, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.27, 0.60, 1, 0),
(443, 1, 11, 3, 4, 8, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.23, 0.40, 1, 0),
(444, 1, 15, 4, 1, 4, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.22, 0.40, 1, 0),
(445, 1, 10, 3, 4, 2, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.30, 0.22, 1, 0),
(446, 1, 14, 5, 4, 11, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.74, 0.19, 1, 0),
(447, 1, 15, 3, 2, 2, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.90, 0.16, 1, 0),
(448, 1, 11, 4, 1, 6, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.36, 0.15, 1, 0),
(449, 1, 13, 3, 2, 9, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.84, 0.15, 1, 0),
(450, 1, 8, 3, 4, 1, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.30, 0.15, 1, 0),
(451, 1, 11, 3, 4, 9, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.66, 0.80, 1, 0),
(452, 1, 0, 0, 0, 0, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.52, 0.60, 1, 0),
(453, 1, 0, 0, 0, 0, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.53, 0.40, 1, 0),
(454, 1, 0, 0, 0, 0, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.98, 0.40, 1, 0),
(455, 1, 0, 0, 0, 0, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.49, 0.22, 1, 0),
(456, 1, 0, 0, 0, 0, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.32, 0.19, 1, 0),
(457, 1, 0, 0, 0, 0, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.95, 0.16, 1, 0),
(458, 1, 0, 0, 0, 0, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.96, 0.15, 1, 0),
(459, 1, 0, 0, 0, 0, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.96, 0.15, 1, 0),
(460, 1, 0, 0, 0, 0, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.92, 0.15, 1, 0),
(461, 1, 0, 0, 0, 0, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.71, 0.80, 1, 0),
(462, 1, 0, 0, 0, 0, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.70, 0.60, 1, 0),
(463, 1, 0, 0, 0, 0, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.39, 0.40, 1, 0),
(464, 1, 0, 0, 0, 0, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.63, 0.40, 1, 0),
(465, 1, 0, 0, 0, 0, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 1.00, 0.22, 1, 0),
(466, 1, 0, 0, 0, 0, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.30, 0.19, 1, 0),
(467, 1, 0, 0, 0, 0, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.19, 0.16, 1, 0),
(468, 1, 0, 0, 0, 0, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.86, 0.15, 1, 0),
(469, 1, 0, 0, 0, 0, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.93, 0.15, 1, 0),
(470, 1, 0, 0, 0, 0, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.15, 0.15, 1, 0),
(471, 1, 0, 0, 0, 0, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.59, 0.80, 1, 0),
(472, 1, 0, 0, 0, 0, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.60, 0.60, 1, 0),
(473, 1, 0, 0, 0, 0, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.23, 0.40, 1, 0),
(474, 1, 0, 0, 0, 0, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.13, 0.40, 1, 0),
(475, 1, 0, 0, 0, 0, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.79, 0.22, 1, 0),
(476, 1, 0, 0, 0, 0, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.74, 0.19, 1, 0),
(477, 1, 0, 0, 0, 0, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.34, 0.16, 1, 0),
(478, 1, 0, 0, 0, 0, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.26, 0.15, 1, 0),
(479, 1, 0, 0, 0, 0, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.21, 0.15, 1, 0),
(480, 1, 0, 0, 0, 0, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.14, 0.15, 1, 0),
(481, 1, 0, 0, 0, 0, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.89, 0.80, 1, 0),
(482, 1, 0, 0, 0, 0, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.32, 0.60, 1, 0),
(483, 1, 0, 0, 0, 0, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.64, 0.40, 1, 0),
(484, 1, 0, 0, 0, 0, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.34, 0.40, 1, 0),
(485, 1, 0, 0, 0, 0, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.56, 0.22, 1, 0),
(486, 1, 0, 0, 0, 0, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.80, 0.19, 1, 0),
(487, 1, 0, 0, 0, 0, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.43, 0.16, 1, 0),
(488, 1, 0, 0, 0, 0, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.56, 0.15, 1, 0),
(489, 1, 0, 0, 0, 0, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.49, 0.15, 1, 0),
(490, 1, 0, 0, 0, 0, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.66, 0.15, 1, 0),
(491, 1, 0, 0, 0, 0, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.86, 0.80, 1, 0),
(492, 1, 0, 0, 0, 0, 0.06, 0.06, 0.20, 0.12, 0.13, 0.21, 0.60, 0.40, 0.60, 1, 0),
(493, 1, 0, 0, 0, 0, 0.06, 0.20, 0.06, 0.06, 0.13, 0.21, 0.40, 0.23, 0.40, 1, 0),
(494, 1, 0, 0, 0, 0, 0.02, 0.20, 0.06, 0.06, 0.02, 0.21, 0.40, 0.73, 0.40, 1, 0),
(495, 1, 0, 0, 0, 0, 0.02, 0.20, 0.07, 0.06, 0.02, 0.21, 0.22, 0.17, 0.22, 1, 0),
(496, 1, 0, 0, 0, 0, 0.02, 0.19, 0.07, 0.05, 0.02, 0.10, 0.19, 0.38, 0.19, 1, 0),
(497, 1, 0, 0, 0, 0, 0.02, 0.12, 0.02, 0.04, 0.02, 0.07, 0.15, 0.37, 0.16, 1, 0),
(498, 1, 0, 0, 0, 0, 0.01, 0.06, 0.02, 0.01, 0.01, 0.06, 0.15, 0.63, 0.15, 1, 0),
(499, 1, 0, 0, 0, 0, 0.01, 0.04, 0.03, 0.01, 0.01, 0.03, 0.15, 0.14, 0.15, 1, 0),
(500, 1, 0, 0, 0, 0, 0.01, 0.02, 0.01, 0.01, 0.01, 0.02, 0.15, 0.49, 0.15, 1, 0),
(501, 1, 3, 2, 1, 1, 0.22, 0.13, 0.06, 0.20, 0.22, 0.40, 0.80, 0.82, 0.80, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `price_quantities`
--

CREATE TABLE IF NOT EXISTS `price_quantities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `price_quantities`
--

INSERT INTO `price_quantities` (`id`, `product_category_id`, `name`, `value`, `status`, `is_deleted`, `created`, `updated`) VALUES
(1, 1, '1', 1, 1, 0, '2015-02-17 13:00:36', '2015-03-13 13:49:16'),
(2, 1, '2-5', 5, 1, 0, '2015-02-17 13:00:36', '2015-03-13 13:49:58'),
(3, 1, '6-10', 10, 1, 0, '2015-02-17 13:00:36', '2015-03-13 13:50:49'),
(4, 1, '11-20', 20, 1, 0, '2015-02-17 13:00:36', '2015-03-13 13:51:00'),
(5, 1, '21-50', 50, 1, 0, '2015-02-17 13:00:36', '2015-03-13 13:51:38'),
(6, 1, '51-500', 500, 1, 0, '2015-02-17 13:00:36', '2015-03-13 13:52:04'),
(7, 1, '501-1000', 1000, 1, 0, '2015-02-17 13:00:36', '2015-03-13 13:52:41'),
(8, 1, '1001-2000', 2000, 1, 0, '2015-02-17 13:00:36', '2015-03-13 13:53:56'),
(9, 1, '2001-3000', 3000, 1, 0, '2015-02-17 13:00:36', '2015-03-13 13:54:42'),
(10, 1, '3001-5000', 5000, 1, 0, '2015-02-17 13:00:36', '2015-03-13 13:55:24'),
(11, 1, '5001-10000', 10000, 1, 0, '2015-02-17 13:00:36', '2015-03-13 13:56:03'),
(12, 1, '10000-20000', 20000, 1, 0, '2015-02-17 13:00:36', '2015-03-13 13:56:27'),
(13, 1, '50000+', 50000, 1, 0, '2015-03-13 00:00:00', '2015-03-13 13:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `production_dummy_prices`
--

CREATE TABLE IF NOT EXISTS `production_dummy_prices` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(4) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_size_id` int(4) NOT NULL,
  `product_style_id` int(4) NOT NULL,
  `qty_id` int(11) DEFAULT NULL,
  `prod_day_id` int(11) NOT NULL,
  `price` float(12,2) DEFAULT NULL,
  `free_qty` int(4) DEFAULT NULL,
  `segmentprice` float(12,2) DEFAULT NULL,
  `swirlprice` float(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

--
-- Dumping data for table `production_dummy_prices`
--

INSERT INTO `production_dummy_prices` (`id`, `product_category_id`, `product_id`, `product_size_id`, `product_style_id`, `qty_id`, `prod_day_id`, `price`, `free_qty`, `segmentprice`, `swirlprice`) VALUES
(1, 1, 3, 2, 1, 2, 3, 2.45, 0, NULL, NULL),
(2, 1, 3, 2, 1, 8, 4, 1.99, 0, NULL, NULL),
(3, 1, 3, 2, 1, 11, 1, 1.59, 0, NULL, NULL),
(4, 1, 3, 2, 1, 7, 4, 1.40, 0, NULL, NULL),
(5, 1, 3, 2, 1, 12, 3, 0.85, 0, NULL, NULL),
(6, 1, 3, 2, 1, 3, 4, 0.85, 0, NULL, NULL),
(7, 1, 3, 2, 1, 4, 3, 0.55, 100, NULL, NULL),
(8, 1, 3, 2, 1, 9, 4, 0.45, 100, NULL, NULL),
(9, 1, 3, 2, 1, 11, 4, 0.38, 100, NULL, NULL),
(10, 1, 3, 2, 1, 2, 2, 0.30, 100, NULL, NULL),
(11, 1, 3, 2, 1, 11, 1, 0.20, 100, NULL, NULL),
(12, 1, 3, 2, 1, 12, 3, 0.19, 100, NULL, NULL),
(13, 1, 3, 2, 1, 2, 3, 0.17, 100, NULL, NULL),
(14, 1, 3, 2, 1, 10, 3, 0.16, 100, NULL, NULL),
(15, 1, 3, 2, 1, 8, 2, 0.14, 100, NULL, NULL),
(16, 1, 3, 2, 1, 8, 4, 0.12, 100, NULL, NULL),
(17, 1, 3, 2, 1, 6, 4, 0.12, 100, NULL, NULL),
(18, 1, 3, 2, 1, 3, 1, 0.12, 100, NULL, NULL),
(19, 1, 13, 2, 2, 8, 2, 30.95, 0, NULL, NULL),
(20, 1, 13, 2, 2, 10, 1, 9.99, 0, NULL, NULL),
(21, 1, 13, 2, 2, 10, 2, 5.29, 0, NULL, NULL),
(22, 1, 13, 2, 2, 9, 2, 2.40, 0, NULL, NULL),
(23, 1, 13, 2, 2, 1, 1, 1.90, 0, NULL, NULL),
(24, 1, 13, 2, 2, 2, 4, 1.85, 0, NULL, NULL),
(25, 1, 13, 2, 2, 7, 2, 0.55, 100, NULL, NULL),
(26, 1, 13, 2, 2, 5, 1, 0.45, 100, NULL, NULL),
(27, 1, 13, 2, 2, 2, 1, 0.38, 100, NULL, NULL),
(28, 1, 13, 2, 2, 6, 2, 0.30, 100, NULL, NULL),
(29, 1, 13, 2, 2, 12, 1, 0.20, 100, NULL, NULL),
(30, 1, 13, 2, 2, 5, 4, 0.19, 100, NULL, NULL),
(31, 1, 13, 2, 2, 12, 1, 0.19, 100, NULL, NULL),
(32, 1, 13, 2, 2, 8, 4, 0.15, 100, NULL, NULL),
(33, 1, 13, 2, 2, 5, 1, 0.15, 100, NULL, NULL),
(34, 1, 13, 2, 2, 12, 1, 0.15, 100, NULL, NULL),
(35, 1, 13, 2, 2, 8, 2, 0.15, 100, NULL, NULL),
(36, 1, 13, 2, 2, 5, 3, 0.12, 100, NULL, NULL),
(37, 1, 10, 2, 1, 10, 3, 2.45, 0, NULL, NULL),
(38, 1, 10, 2, 1, 1, 2, 1.35, 0, NULL, NULL),
(39, 1, 10, 2, 1, 11, 3, 1.35, 0, NULL, NULL),
(40, 1, 10, 2, 1, 3, 4, 1.35, 0, NULL, NULL),
(41, 1, 10, 2, 1, 3, 3, 0.65, 0, NULL, NULL),
(42, 1, 10, 2, 1, 8, 4, 0.65, 0, NULL, NULL),
(43, 1, 10, 2, 1, 6, 4, 0.33, 100, NULL, NULL),
(44, 1, 10, 2, 1, 5, 1, 0.26, 100, NULL, NULL),
(45, 1, 10, 2, 1, 8, 1, 0.24, 100, NULL, NULL),
(46, 1, 10, 2, 1, 10, 1, 0.18, 100, NULL, NULL),
(47, 1, 10, 2, 1, 3, 4, 0.13, 100, NULL, NULL),
(48, 1, 10, 2, 1, 7, 1, 0.13, 100, NULL, NULL),
(49, 1, 10, 2, 1, 4, 1, 0.13, 100, NULL, NULL),
(50, 1, 10, 2, 1, 8, 4, 0.13, 100, NULL, NULL),
(51, 1, 10, 2, 1, 6, 4, 0.13, 100, NULL, NULL),
(52, 1, 10, 2, 1, 3, 3, 0.10, 100, NULL, NULL),
(53, 1, 10, 2, 1, 9, 2, 0.10, 100, NULL, NULL),
(54, 1, 10, 2, 1, 12, 4, 0.10, 100, NULL, NULL),
(55, 1, 11, 1, 1, 10, 4, 30.43, 0, NULL, NULL),
(56, 1, 11, 1, 1, 2, 3, 7.43, 0, NULL, NULL),
(57, 1, 11, 1, 1, 12, 1, 5.24, 0, NULL, NULL),
(58, 1, 11, 1, 1, 9, 2, 4.24, 0, NULL, NULL),
(59, 1, 11, 1, 1, 8, 1, 2.12, 0, NULL, NULL),
(60, 1, 11, 1, 1, 1, 3, 2.12, 0, NULL, NULL),
(61, 1, 11, 1, 1, 3, 3, 1.30, 100, NULL, NULL),
(62, 1, 11, 1, 1, 1, 1, 1.29, 100, NULL, NULL),
(63, 1, 11, 1, 1, 7, 1, 1.25, 100, NULL, NULL),
(64, 1, 11, 1, 1, 7, 2, 0.89, 100, NULL, NULL),
(65, 1, 11, 1, 1, 12, 2, 0.56, 100, NULL, NULL),
(66, 1, 11, 1, 1, 3, 1, 0.49, 100, NULL, NULL),
(67, 1, 11, 1, 1, 5, 4, 0.49, 100, NULL, NULL),
(68, 1, 11, 1, 1, 3, 1, 0.36, 100, NULL, NULL),
(69, 1, 11, 1, 1, 9, 1, 0.24, 100, NULL, NULL),
(70, 1, 11, 1, 1, 12, 3, 0.24, 100, NULL, NULL),
(71, 1, 11, 1, 1, 10, 4, 0.24, 100, NULL, NULL),
(72, 1, 11, 1, 1, 3, 1, 0.23, 100, NULL, NULL),
(73, 1, 8, 2, 1, 6, 3, 0.00, 0, NULL, NULL),
(74, 1, 8, 2, 1, 9, 3, 0.00, 0, NULL, NULL),
(75, 1, 8, 2, 1, 3, 4, 8.75, 0, NULL, NULL),
(76, 1, 8, 2, 1, 10, 1, 3.99, 0, NULL, NULL),
(77, 1, 8, 2, 1, 7, 1, 2.30, 0, NULL, NULL),
(78, 1, 8, 2, 1, 3, 2, 1.50, 0, NULL, NULL),
(79, 1, 8, 2, 1, 4, 4, 0.61, 100, NULL, NULL),
(80, 1, 8, 2, 1, 10, 3, 0.45, 100, NULL, NULL),
(81, 1, 8, 2, 1, 4, 2, 0.38, 100, NULL, NULL),
(82, 1, 8, 2, 1, 12, 3, 0.30, 100, NULL, NULL),
(83, 1, 8, 2, 1, 12, 1, 0.20, 100, NULL, NULL),
(84, 1, 8, 2, 1, 12, 2, 0.19, 100, NULL, NULL),
(85, 1, 8, 2, 1, 9, 1, 0.17, 100, NULL, NULL),
(86, 1, 8, 2, 1, 11, 2, 0.16, 100, NULL, NULL),
(87, 1, 8, 2, 1, 3, 3, 0.14, 100, NULL, NULL),
(88, 1, 8, 2, 1, 4, 3, 0.14, 100, NULL, NULL),
(89, 1, 8, 2, 1, 11, 2, 0.14, 100, NULL, NULL),
(90, 1, 8, 2, 1, 6, 3, 0.12, 100, NULL, NULL),
(91, 1, 15, 2, 1, 11, 2, 6.25, 0, NULL, NULL),
(92, 1, 15, 2, 1, 10, 2, 5.35, 0, NULL, NULL),
(93, 1, 15, 2, 1, 4, 4, 3.68, 0, NULL, NULL),
(94, 1, 15, 2, 1, 3, 1, 3.01, 0, NULL, NULL),
(95, 1, 15, 2, 1, 2, 1, 1.10, 0, NULL, NULL),
(96, 1, 15, 2, 1, 12, 1, 1.05, 0, NULL, NULL),
(97, 1, 15, 2, 1, 6, 3, 0.80, 100, NULL, NULL),
(98, 1, 15, 2, 1, 7, 3, 0.47, 100, NULL, NULL),
(99, 1, 15, 2, 1, 4, 1, 0.43, 100, NULL, NULL),
(100, 1, 15, 2, 1, 9, 1, 0.39, 100, NULL, NULL),
(101, 1, 15, 2, 1, 8, 4, 0.26, 100, NULL, NULL),
(102, 1, 15, 2, 1, 12, 4, 0.26, 100, NULL, NULL),
(103, 1, 15, 2, 1, 2, 4, 0.26, 100, NULL, NULL),
(104, 1, 15, 2, 1, 6, 4, 0.21, 100, NULL, NULL),
(105, 1, 15, 2, 1, 3, 1, 0.20, 100, NULL, NULL),
(106, 1, 15, 2, 1, 7, 1, 0.20, 100, NULL, NULL),
(107, 1, 15, 2, 1, 3, 4, 0.20, 100, NULL, NULL),
(108, 1, 15, 2, 1, 6, 2, 0.15, 100, NULL, NULL),
(109, 1, 12, 2, 1, 7, 4, 0.00, 0, NULL, NULL),
(110, 1, 12, 2, 1, 6, 3, 0.00, 0, NULL, NULL),
(111, 1, 12, 2, 1, 8, 3, 0.00, 0, NULL, NULL),
(112, 1, 12, 2, 1, 10, 1, 0.00, 0, NULL, NULL),
(113, 1, 12, 2, 1, 3, 1, 3.50, 0, NULL, NULL),
(114, 1, 12, 2, 1, 7, 4, 2.99, 0, NULL, NULL),
(115, 1, 12, 2, 1, 3, 3, 1.39, 100, NULL, NULL),
(116, 1, 12, 2, 1, 6, 3, 0.95, 100, NULL, NULL),
(117, 1, 12, 2, 1, 6, 4, 0.84, 100, NULL, NULL),
(118, 1, 12, 2, 1, 1, 1, 0.71, 100, NULL, NULL),
(119, 1, 12, 2, 1, 10, 1, 0.59, 100, NULL, NULL),
(120, 1, 12, 2, 1, 9, 3, 0.41, 100, NULL, NULL),
(121, 1, 12, 2, 1, 3, 4, 0.31, 100, NULL, NULL),
(122, 1, 12, 2, 1, 11, 4, 0.31, 100, NULL, NULL),
(123, 1, 12, 2, 1, 12, 3, 0.31, 100, NULL, NULL),
(124, 1, 12, 2, 1, 2, 1, 0.31, 100, NULL, NULL),
(125, 1, 12, 2, 1, 9, 1, 0.31, 100, NULL, NULL),
(126, 1, 12, 2, 1, 1, 2, 0.31, 100, NULL, NULL),
(127, 1, 14, 2, 1, 1, 1, 0.00, 0, NULL, NULL),
(128, 1, 14, 2, 1, 4, 3, 0.00, 0, NULL, NULL),
(129, 1, 14, 2, 1, 5, 1, 0.00, 0, NULL, NULL),
(130, 1, 14, 2, 1, 12, 3, 4.53, 0, NULL, NULL),
(131, 1, 14, 2, 1, 9, 2, 2.35, 0, NULL, NULL),
(132, 1, 14, 2, 1, 7, 2, 1.27, 0, NULL, NULL),
(133, 1, 14, 2, 1, 7, 1, 2.69, 100, NULL, NULL),
(134, 1, 14, 2, 1, 1, 4, 1.50, 100, NULL, NULL),
(135, 1, 14, 2, 1, 10, 2, 0.89, 100, NULL, NULL),
(136, 1, 14, 2, 1, 8, 1, 0.45, 100, NULL, NULL),
(137, 1, 14, 2, 1, 10, 4, 0.32, 100, NULL, NULL),
(138, 1, 14, 2, 1, 1, 4, 0.32, 100, NULL, NULL),
(139, 1, 14, 2, 1, 10, 4, 0.32, 100, NULL, NULL),
(140, 1, 14, 2, 1, 12, 3, 0.30, 100, NULL, NULL),
(141, 1, 14, 2, 1, 4, 3, 0.29, 100, NULL, NULL),
(142, 1, 14, 2, 1, 8, 3, 0.29, 100, NULL, NULL),
(143, 1, 14, 2, 1, 2, 4, 0.29, 100, NULL, NULL),
(144, 1, 14, 2, 1, 9, 4, 0.21, 100, NULL, NULL),
(145, 1, 4, 2, 1, 2, 2, 2.45, 0, NULL, NULL),
(146, 1, 4, 2, 1, 8, 1, 1.99, 0, NULL, NULL),
(147, 1, 4, 2, 1, 9, 2, 1.59, 0, NULL, NULL),
(148, 1, 4, 2, 1, 7, 4, 1.40, 0, NULL, NULL),
(149, 1, 4, 2, 1, 11, 3, 0.85, 0, NULL, NULL),
(150, 1, 4, 2, 1, 7, 4, 0.85, 0, NULL, NULL),
(151, 1, 4, 2, 1, 2, 3, 0.55, 100, NULL, NULL),
(152, 1, 4, 2, 1, 2, 2, 0.45, 100, NULL, NULL),
(153, 1, 4, 2, 1, 3, 1, 0.38, 100, NULL, NULL),
(154, 1, 4, 2, 1, 8, 2, 0.30, 100, NULL, NULL),
(155, 1, 4, 2, 1, 7, 2, 0.20, 100, NULL, NULL),
(156, 1, 4, 2, 1, 12, 2, 0.19, 100, NULL, NULL),
(157, 1, 4, 2, 1, 12, 3, 0.17, 100, NULL, NULL),
(158, 1, 4, 2, 1, 12, 3, 0.16, 100, NULL, NULL),
(159, 1, 4, 2, 1, 10, 3, 0.14, 100, NULL, NULL),
(160, 1, 4, 2, 1, 4, 4, 0.12, 100, NULL, NULL),
(161, 1, 4, 2, 1, 12, 1, 0.12, 100, NULL, NULL),
(162, 1, 4, 2, 1, 1, 3, 0.12, 100, NULL, NULL),
(163, 1, 3, 2, 1, 1, 4, 0.00, NULL, NULL, NULL),
(164, 1, 3, 2, 1, 1, 3, 1.89, NULL, NULL, NULL),
(165, 1, 3, 2, 1, 1, 2, 17.89, NULL, NULL, NULL),
(166, 1, 3, 2, 1, 1, 1, 19.89, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(21) unsigned NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ref` varchar(20) NOT NULL,
  `volume` int(8) DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT 'default-product.gif',
  `type` varchar(20) DEFAULT NULL,
  `min_qty` tinyint(3) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_category_id`, `name`, `ref`, `volume`, `slug`, `description`, `image`, `type`, `min_qty`, `status`, `is_deleted`, `created`, `updated`) VALUES
(3, 1, 'Debossed', 'debossed', NULL, 'Debossed', '12e12e', 'prod3771232015-03-02.png', NULL, 1, 1, 0, '2015-02-03 12:46:33', '2015-03-02 15:58:29'),
(4, 2, 'Debossed Wristbands', '', NULL, 'DebossedWristband', 'This is product is best for any one', 'prod3345152015-02-16.png', NULL, 1, 1, 0, '2015-02-03 13:12:40', '2015-02-16 18:02:17'),
(5, 2, 'Tubular', '', NULL, 'tubular', '', 'prod6054112015-02-04.png', NULL, 1, 1, 0, '2015-02-03 13:13:38', '2015-02-13 17:45:00'),
(8, 1, 'Embossed', 'embossed', NULL, 'Embossed', 'This is for testing.....', 'prod1949462015-03-02.png', NULL, 10, 1, 0, '2015-02-04 10:03:00', '2015-03-02 16:00:19'),
(10, 1, 'Dual Layer', 'dual_layer', NULL, 'DualLayer', '', 'prod5611332015-03-02.png', NULL, 1, 1, 0, '2015-02-16 17:48:23', '2015-03-02 16:05:10'),
(11, 1, 'Printed', 'printed', NULL, 'Printed', '', 'prod6053602015-03-02.png', NULL, 1, 1, 0, '2015-02-16 17:49:14', '2015-03-02 16:02:42'),
(12, 1, 'Embossed Printed', 'embossed_printed', NULL, 'EmbossedPrinted', '', 'prod9544042015-03-02.png', NULL, 50, 1, 0, '2015-02-16 17:49:49', '2015-03-02 16:04:05'),
(13, 1, 'Blank', 'blank', NULL, 'Blank', '', 'prod8300362015-03-02.png', NULL, 1, 1, 0, '2015-02-16 17:50:48', '2015-03-02 16:06:11'),
(14, 1, 'Figured', 'figured', NULL, 'Figured', '', 'prod5610102015-03-02.png', NULL, 20, 1, 0, '2015-02-16 17:53:04', '2015-03-02 16:05:44'),
(15, 1, 'Debossed Color Filled', 'color_filled', NULL, 'DebossedColorFilled', '', 'prod7758562015-03-02.png', NULL, 1, 1, 0, '2015-02-16 18:03:50', '2015-03-02 16:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `slug` varchar(150) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `description`, `slug`, `image`, `status`, `is_deleted`, `created`, `updated`) VALUES
(1, 'wristband', '', 'wristband', 'CATe7830082015-02-04.png', 1, 0, '2015-02-03 11:12:06', '2015-02-04 18:08:39'),
(2, 'lanyard', '', 'lanyard', 'CATe7145102015-02-04.png', 1, 0, '2015-02-03 11:12:38', '2015-02-04 18:08:46'),
(3, 'usb', '', 'usb', 'CATe3863832015-02-04.png', 1, 0, '2015-02-03 11:12:50', '2015-02-04 18:08:54'),
(4, 'Tattoo', 'This is best fo you', 'tattoo', 'CATe5241672015-02-04.png', 1, 0, '2015-02-03 18:22:37', '2015-02-04 18:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE IF NOT EXISTS `product_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_size_id` int(11) NOT NULL,
  `product_style_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `hex_value` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_category_id`, `product_id`, `product_size_id`, `product_style_id`, `name`, `image`, `hex_value`, `status`) VALUES
(1, 1, 3, 1, 1, 'White', 'IMG5279128.jpg', '#ffffff', 1),
(2, 1, 3, 1, 1, 'Red', 'IMG27207544.jpg', '#ff0000', 1),
(3, 1, 4, 2, 2, 'Blue Red', 'IMG84270958.jpg', '#07348b,#e11c1c', 1),
(4, 1, 8, 4, 2, 'Black Red', 'IMG39335989.jpg', '#000000,#e11c1c', 1),
(5, 1, 11, 5, 1, 'Purple', 'IMG26001662.jpg', '#402c83', 1),
(6, 1, 15, 7, 2, 'White Green', 'IMG7789956.jpg', '#ffffff,#274e13', 1),
(7, 1, 13, 5, 2, 'LimeGreen White', 'IMG34587251.jpg', '#00ff00,#ffffff', 1),
(8, 1, 11, 4, 2, 'Brown White', 'IMG39914412.jpg', '#9f560a,#ffffff', 1),
(9, 1, 3, 5, 1, 'Black', 'IMG13984502.jpg', '#000000', 1),
(10, 1, 3, 1, 4, 'Black Orange', 'IMG50235137.jpg', '#000000,#d08b44', 1),
(11, 1, 8, 2, 4, 'Lavender White', 'IMG38371348.jpg', '#513c87,#ffffff', 1),
(12, 1, 3, 1, 2, 'Orange Black', 'IMG6400326.jpg', '#e69138,#000000', 1),
(13, 1, 3, 2, 2, 'Purple Black', 'IMG2037337.jpg', '#402c83,#000000', 1),
(14, 1, 3, 4, 1, 'Green', 'IMG27883479.jpg', '#274e13', 1),
(15, 1, 3, 6, 1, 'Yellow', 'IMG52522948.jpg', '#ffff00', 1),
(16, 1, 3, 7, 1, 'Blue', 'IMG60694849.jpg', '#07348b', 1),
(17, 1, 3, 1, 1, 'Orange', 'IMG29413879.jpg', '#ff9900', 1),
(18, 1, 3, 4, 1, 'LightBlue', 'IMG80112673.jpg', '#6fa8dc', 1),
(19, 1, 3, 2, 1, 'RoyalBlue', 'IMG80502594.jpg', '#07348b', 1),
(20, 1, 3, 2, 2, 'Blue Black', 'IMG51719724.jpg', '#0000ff,#000000', 1),
(21, 1, 3, 1, 4, 'Blue Black', 'IMG77292900.jpg', '#07348b,#000000', 1),
(22, 1, 15, 2, 2, 'Rainbow', 'IMG16107734.jpg', '#4d6eae,#e58f0e,#ff00ff,#9900ff,#9f560a,#93c47d', 1),
(23, 1, 8, 2, 1, 'Red', 'IMG6854290.jpg', '#ff0000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_dummy_prices`
--

CREATE TABLE IF NOT EXISTS `product_dummy_prices` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(4) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_size_id` int(4) NOT NULL,
  `product_style_id` int(4) NOT NULL,
  `qty_id` tinyint(2) NOT NULL,
  `price` float(12,2) DEFAULT NULL,
  `free_qty` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- Dumping data for table `product_dummy_prices`
--

INSERT INTO `product_dummy_prices` (`id`, `product_category_id`, `product_id`, `product_size_id`, `product_style_id`, `qty_id`, `price`, `free_qty`) VALUES
(1, 1, 3, 2, 1, 1, 2.45, 0),
(2, 1, 3, 2, 1, 7, 1.99, 0),
(3, 1, 3, 2, 1, 4, 1.59, 0),
(4, 1, 3, 2, 1, 12, 1.40, 0),
(5, 1, 3, 2, 1, 9, 0.85, 0),
(6, 1, 3, 2, 1, 8, 0.85, 0),
(7, 1, 3, 2, 1, 13, 0.55, 100),
(8, 1, 3, 2, 1, 13, 0.45, 100),
(9, 1, 3, 2, 1, 2, 0.38, 100),
(10, 1, 3, 2, 1, 7, 0.30, 100),
(11, 1, 3, 2, 1, 3, 0.20, 100),
(12, 1, 3, 2, 1, 8, 0.19, 100),
(13, 1, 3, 2, 1, 2, 0.17, 100),
(14, 1, 3, 2, 1, 1, 0.16, 100),
(15, 1, 3, 2, 1, 12, 0.14, 100),
(16, 1, 3, 2, 1, 4, 0.12, 100),
(17, 1, 3, 2, 1, 9, 0.12, 100),
(18, 1, 3, 2, 1, 6, 0.12, 100),
(19, 1, 13, 2, 2, 4, 30.95, 0),
(20, 1, 13, 2, 2, 12, 9.99, 0),
(21, 1, 13, 2, 2, 11, 5.29, 0),
(22, 1, 13, 2, 2, 5, 2.40, 0),
(23, 1, 13, 2, 2, 5, 1.90, 0),
(24, 1, 13, 2, 2, 11, 1.85, 0),
(25, 1, 13, 2, 2, 12, 0.55, 100),
(26, 1, 13, 2, 2, 2, 0.45, 100),
(27, 1, 13, 2, 2, 12, 0.38, 100),
(28, 1, 13, 2, 2, 1, 0.30, 100),
(29, 1, 13, 2, 2, 9, 0.20, 100),
(30, 1, 13, 2, 2, 13, 0.19, 100),
(31, 1, 13, 2, 2, 12, 0.19, 100),
(32, 1, 13, 2, 2, 8, 0.15, 100),
(33, 1, 13, 2, 2, 4, 0.15, 100),
(34, 1, 13, 2, 2, 8, 0.15, 100),
(35, 1, 13, 2, 2, 13, 0.15, 100),
(36, 1, 13, 2, 2, 2, 0.12, 100),
(37, 1, 10, 2, 1, 11, 2.45, 0),
(38, 1, 10, 2, 1, 8, 1.35, 0),
(39, 1, 10, 2, 1, 8, 1.35, 0),
(40, 1, 10, 2, 1, 13, 1.35, 0),
(41, 1, 10, 2, 1, 4, 0.65, 0),
(42, 1, 10, 2, 1, 7, 0.65, 0),
(43, 1, 10, 2, 1, 11, 0.33, 100),
(44, 1, 10, 2, 1, 4, 0.26, 100),
(45, 1, 10, 2, 1, 12, 0.24, 100),
(46, 1, 10, 2, 1, 11, 0.18, 100),
(47, 1, 10, 2, 1, 5, 0.13, 100),
(48, 1, 10, 2, 1, 5, 0.13, 100),
(49, 1, 10, 2, 1, 8, 0.13, 100),
(50, 1, 10, 2, 1, 1, 0.13, 100),
(51, 1, 10, 2, 1, 6, 0.13, 100),
(52, 1, 10, 2, 1, 13, 0.10, 100),
(53, 1, 10, 2, 1, 8, 0.10, 100),
(54, 1, 10, 2, 1, 2, 0.10, 100),
(55, 1, 11, 1, 1, 10, 30.43, 0),
(56, 1, 11, 1, 1, 6, 7.43, 0),
(57, 1, 11, 1, 1, 13, 5.24, 0),
(58, 1, 11, 1, 1, 5, 4.24, 0),
(59, 1, 11, 1, 1, 11, 2.12, 0),
(60, 1, 11, 1, 1, 1, 2.12, 0),
(61, 1, 11, 1, 1, 12, 1.30, 100),
(62, 1, 11, 1, 1, 2, 1.29, 100),
(63, 1, 11, 1, 1, 1, 1.25, 100),
(64, 1, 11, 1, 1, 13, 0.89, 100),
(65, 1, 11, 1, 1, 7, 0.56, 100),
(66, 1, 11, 1, 1, 10, 0.49, 100),
(67, 1, 11, 1, 1, 13, 0.49, 100),
(68, 1, 11, 1, 1, 12, 0.36, 100),
(69, 1, 11, 1, 1, 4, 0.24, 100),
(70, 1, 11, 1, 1, 11, 0.24, 100),
(71, 1, 11, 1, 1, 5, 0.24, 100),
(72, 1, 11, 1, 1, 1, 0.23, 100),
(73, 1, 8, 2, 1, 6, 0.00, 0),
(74, 1, 8, 2, 1, 11, 0.00, 0),
(75, 1, 8, 2, 1, 13, 8.75, 0),
(76, 1, 8, 2, 1, 4, 3.99, 0),
(77, 1, 8, 2, 1, 9, 2.30, 0),
(78, 1, 8, 2, 1, 3, 1.50, 0),
(79, 1, 8, 2, 1, 2, 0.61, 100),
(80, 1, 8, 2, 1, 13, 0.45, 100),
(81, 1, 8, 2, 1, 8, 0.38, 100),
(82, 1, 8, 2, 1, 1, 0.30, 100),
(83, 1, 8, 2, 1, 7, 0.20, 100),
(84, 1, 8, 2, 1, 4, 0.19, 100),
(85, 1, 8, 2, 1, 13, 0.17, 100),
(86, 1, 8, 2, 1, 1, 0.16, 100),
(87, 1, 8, 2, 1, 5, 0.14, 100),
(88, 1, 8, 2, 1, 9, 0.14, 100),
(89, 1, 8, 2, 1, 3, 0.14, 100),
(90, 1, 8, 2, 1, 13, 0.12, 100),
(91, 1, 15, 2, 1, 2, 6.25, 0),
(92, 1, 15, 2, 1, 12, 5.35, 0),
(93, 1, 15, 2, 1, 13, 3.68, 0),
(94, 1, 15, 2, 1, 3, 3.01, 0),
(95, 1, 15, 2, 1, 13, 1.10, 0),
(96, 1, 15, 2, 1, 5, 1.05, 0),
(97, 1, 15, 2, 1, 11, 0.80, 100),
(98, 1, 15, 2, 1, 12, 0.47, 100),
(99, 1, 15, 2, 1, 13, 0.43, 100),
(100, 1, 15, 2, 1, 2, 0.39, 100),
(101, 1, 15, 2, 1, 12, 0.26, 100),
(102, 1, 15, 2, 1, 3, 0.26, 100),
(103, 1, 15, 2, 1, 1, 0.26, 100),
(104, 1, 15, 2, 1, 9, 0.21, 100),
(105, 1, 15, 2, 1, 4, 0.20, 100),
(106, 1, 15, 2, 1, 6, 0.20, 100),
(107, 1, 15, 2, 1, 2, 0.20, 100),
(108, 1, 15, 2, 1, 4, 0.15, 100),
(109, 1, 12, 2, 1, 2, 0.00, 0),
(110, 1, 12, 2, 1, 9, 0.00, 0),
(111, 1, 12, 2, 1, 2, 0.00, 0),
(112, 1, 12, 2, 1, 9, 0.00, 0),
(113, 1, 12, 2, 1, 11, 3.50, 0),
(114, 1, 12, 2, 1, 1, 2.99, 0),
(115, 1, 12, 2, 1, 9, 1.39, 100),
(116, 1, 12, 2, 1, 4, 0.95, 100),
(117, 1, 12, 2, 1, 5, 0.84, 100),
(118, 1, 12, 2, 1, 1, 0.71, 100),
(119, 1, 12, 2, 1, 3, 0.59, 100),
(120, 1, 12, 2, 1, 12, 0.41, 100),
(121, 1, 12, 2, 1, 13, 0.31, 100),
(122, 1, 12, 2, 1, 12, 0.31, 100),
(123, 1, 12, 2, 1, 9, 0.31, 100),
(124, 1, 12, 2, 1, 9, 0.31, 100),
(125, 1, 12, 2, 1, 3, 0.31, 100),
(126, 1, 12, 2, 1, 1, 0.31, 100),
(127, 1, 14, 2, 1, 10, 0.00, 0),
(128, 1, 14, 2, 1, 8, 0.00, 0),
(129, 1, 14, 2, 1, 10, 0.00, 0),
(130, 1, 14, 2, 1, 12, 4.53, 0),
(131, 1, 14, 2, 1, 1, 2.35, 0),
(132, 1, 14, 2, 1, 9, 1.27, 0),
(133, 1, 14, 2, 1, 4, 2.69, 100),
(134, 1, 14, 2, 1, 5, 1.50, 100),
(135, 1, 14, 2, 1, 12, 0.89, 100),
(136, 1, 14, 2, 1, 4, 0.45, 100),
(137, 1, 14, 2, 1, 11, 0.32, 100),
(138, 1, 14, 2, 1, 2, 0.32, 100),
(139, 1, 14, 2, 1, 4, 0.32, 100),
(140, 1, 14, 2, 1, 13, 0.30, 100),
(141, 1, 14, 2, 1, 13, 0.29, 100),
(142, 1, 14, 2, 1, 12, 0.29, 100),
(143, 1, 14, 2, 1, 7, 0.29, 100),
(144, 1, 14, 2, 1, 11, 0.21, 100),
(145, 1, 4, 2, 1, 10, 2.45, 0),
(146, 1, 4, 2, 1, 3, 1.99, 0),
(147, 1, 4, 2, 1, 9, 1.59, 0),
(148, 1, 4, 2, 1, 9, 1.40, 0),
(149, 1, 4, 2, 1, 6, 0.85, 0),
(150, 1, 4, 2, 1, 3, 0.85, 0),
(151, 1, 4, 2, 1, 10, 0.55, 100),
(152, 1, 4, 2, 1, 12, 0.45, 100),
(153, 1, 4, 2, 1, 5, 0.38, 100),
(154, 1, 4, 2, 1, 2, 0.30, 100),
(155, 1, 4, 2, 1, 8, 0.20, 100),
(156, 1, 4, 2, 1, 6, 0.19, 100),
(157, 1, 4, 2, 1, 6, 0.17, 100),
(158, 1, 4, 2, 1, 11, 0.16, 100),
(159, 1, 4, 2, 1, 9, 0.14, 100),
(160, 1, 4, 2, 1, 1, 0.12, 100),
(161, 1, 4, 2, 1, 1, 0.12, 100),
(162, 1, 4, 2, 1, 2, 0.12, 100);

-- --------------------------------------------------------

--
-- Table structure for table `product_prices`
--

CREATE TABLE IF NOT EXISTS `product_prices` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(4) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_size_id` int(4) NOT NULL,
  `product_style_id` int(4) NOT NULL,
  `qty` varchar(20) DEFAULT NULL,
  `price` float(12,2) DEFAULT NULL,
  `free_qty` int(4) DEFAULT NULL,
  `segmentprice` float(12,2) DEFAULT NULL,
  `swirlprice` float(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- Dumping data for table `product_prices`
--

INSERT INTO `product_prices` (`id`, `product_category_id`, `product_id`, `product_size_id`, `product_style_id`, `qty`, `price`, `free_qty`, `segmentprice`, `swirlprice`) VALUES
(1, 1, 3, 2, 1, '1-4', 2.45, 0, NULL, NULL),
(2, 1, 3, 2, 1, '5-9', 1.99, 0, NULL, NULL),
(3, 1, 3, 2, 1, '10-19', 1.59, 0, NULL, NULL),
(4, 1, 3, 2, 1, '20-49', 1.40, 0, NULL, NULL),
(5, 1, 3, 2, 1, '50-74', 0.85, 0, NULL, NULL),
(6, 1, 3, 2, 1, '75-99', 0.85, 0, NULL, NULL),
(7, 1, 3, 2, 1, '100-199', 0.55, 100, NULL, NULL),
(8, 1, 3, 2, 1, '200-299', 0.45, 100, NULL, NULL),
(9, 1, 3, 2, 1, '300-499', 0.38, 100, NULL, NULL),
(10, 1, 3, 2, 1, '500-999', 0.30, 100, NULL, NULL),
(11, 1, 3, 2, 1, '1000-1999', 0.20, 100, NULL, NULL),
(12, 1, 3, 2, 1, '2000-2999', 0.19, 100, NULL, NULL),
(13, 1, 3, 2, 1, '3000-4999', 0.17, 100, NULL, NULL),
(14, 1, 3, 2, 1, '5000-9999', 0.16, 100, NULL, NULL),
(15, 1, 3, 2, 1, '10000-19999', 0.14, 100, NULL, NULL),
(16, 1, 3, 2, 1, '20000-49999', 0.12, 100, NULL, NULL),
(17, 1, 3, 2, 1, '50000-99999', 0.12, 100, NULL, NULL),
(18, 1, 3, 2, 1, '100000+', 0.12, 100, NULL, NULL),
(19, 1, 13, 2, 2, '1-4', 30.95, 0, NULL, NULL),
(20, 1, 13, 2, 2, '5-9', 9.99, 0, NULL, NULL),
(21, 1, 13, 2, 2, '10-19', 5.29, 0, NULL, NULL),
(22, 1, 13, 2, 2, '20-49', 2.40, 0, NULL, NULL),
(23, 1, 13, 2, 2, '50-74', 1.90, 0, NULL, NULL),
(24, 1, 13, 2, 2, '75-99', 1.85, 0, NULL, NULL),
(25, 1, 13, 2, 2, '100-199', 0.55, 100, NULL, NULL),
(26, 1, 13, 2, 2, '200-299', 0.45, 100, NULL, NULL),
(27, 1, 13, 2, 2, '300-499', 0.38, 100, NULL, NULL),
(28, 1, 13, 2, 2, '500-999', 0.30, 100, NULL, NULL),
(29, 1, 13, 2, 2, '1000-1999', 0.20, 100, NULL, NULL),
(30, 1, 13, 2, 2, '2000-2999', 0.19, 100, NULL, NULL),
(31, 1, 13, 2, 2, '3000-4999', 0.19, 100, NULL, NULL),
(32, 1, 13, 2, 2, '5000-9999', 0.15, 100, NULL, NULL),
(33, 1, 13, 2, 2, '10000-19999', 0.15, 100, NULL, NULL),
(34, 1, 13, 2, 2, '20000-49999', 0.15, 100, NULL, NULL),
(35, 1, 13, 2, 2, '50000-99999', 0.15, 100, NULL, NULL),
(36, 1, 13, 2, 2, '100000+', 0.12, 100, NULL, NULL),
(37, 1, 10, 2, 1, '1-4', 2.45, 0, NULL, NULL),
(38, 1, 10, 2, 1, '5-9', 1.35, 0, NULL, NULL),
(39, 1, 10, 2, 1, '10-19', 1.35, 0, NULL, NULL),
(40, 1, 10, 2, 1, '20-49', 1.35, 0, NULL, NULL),
(41, 1, 10, 2, 1, '50-74', 0.65, 0, NULL, NULL),
(42, 1, 10, 2, 1, '75-99', 0.65, 0, NULL, NULL),
(43, 1, 10, 2, 1, '100-199', 0.33, 100, NULL, NULL),
(44, 1, 10, 2, 1, '200-299', 0.26, 100, NULL, NULL),
(45, 1, 10, 2, 1, '300-499', 0.24, 100, NULL, NULL),
(46, 1, 10, 2, 1, '500-999', 0.18, 100, NULL, NULL),
(47, 1, 10, 2, 1, '1000-1999', 0.13, 100, NULL, NULL),
(48, 1, 10, 2, 1, '2000-2999', 0.13, 100, NULL, NULL),
(49, 1, 10, 2, 1, '3000-4999', 0.13, 100, NULL, NULL),
(50, 1, 10, 2, 1, '5000-9999', 0.13, 100, NULL, NULL),
(51, 1, 10, 2, 1, '10000-19999', 0.13, 100, NULL, NULL),
(52, 1, 10, 2, 1, '20000-49999', 0.10, 100, NULL, NULL),
(53, 1, 10, 2, 1, '50000-99999', 0.10, 100, NULL, NULL),
(54, 1, 10, 2, 1, '100000+', 0.10, 100, NULL, NULL),
(55, 1, 11, 1, 1, '1-4', 30.43, 0, NULL, NULL),
(56, 1, 11, 1, 1, '5-9', 7.43, 0, NULL, NULL),
(57, 1, 11, 1, 1, '10-19', 5.24, 0, NULL, NULL),
(58, 1, 11, 1, 1, '20-49', 4.24, 0, NULL, NULL),
(59, 1, 11, 1, 1, '50-74', 2.12, 0, NULL, NULL),
(60, 1, 11, 1, 1, '75-99', 2.12, 0, NULL, NULL),
(61, 1, 11, 1, 1, '100-199', 1.30, 100, NULL, NULL),
(62, 1, 11, 1, 1, '200-299', 1.29, 100, NULL, NULL),
(63, 1, 11, 1, 1, '300-499', 1.25, 100, NULL, NULL),
(64, 1, 11, 1, 1, '500-999', 0.89, 100, NULL, NULL),
(65, 1, 11, 1, 1, '1000-1999', 0.56, 100, NULL, NULL),
(66, 1, 11, 1, 1, '2000-2999', 0.49, 100, NULL, NULL),
(67, 1, 11, 1, 1, '3000-4999', 0.49, 100, NULL, NULL),
(68, 1, 11, 1, 1, '5000-9999', 0.36, 100, NULL, NULL),
(69, 1, 11, 1, 1, '10000-19999', 0.24, 100, NULL, NULL),
(70, 1, 11, 1, 1, '20000-49999', 0.24, 100, NULL, NULL),
(71, 1, 11, 1, 1, '50000-99999', 0.24, 100, NULL, NULL),
(72, 1, 11, 1, 1, '100000+', 0.23, 100, NULL, NULL),
(73, 1, 8, 2, 1, '1-4', 0.00, 0, NULL, NULL),
(74, 1, 8, 2, 1, '5-9', 0.00, 0, NULL, NULL),
(75, 1, 8, 2, 1, '10-19', 8.75, 0, NULL, NULL),
(76, 1, 8, 2, 1, '20-49', 3.99, 0, NULL, NULL),
(77, 1, 8, 2, 1, '50-74', 2.30, 0, NULL, NULL),
(78, 1, 8, 2, 1, '75-99', 1.50, 0, NULL, NULL),
(79, 1, 8, 2, 1, '100-199', 0.61, 100, NULL, NULL),
(80, 1, 8, 2, 1, '200-299', 0.45, 100, NULL, NULL),
(81, 1, 8, 2, 1, '300-499', 0.38, 100, NULL, NULL),
(82, 1, 8, 2, 1, '500-999', 0.30, 100, NULL, NULL),
(83, 1, 8, 2, 1, '1000-1999', 0.20, 100, NULL, NULL),
(84, 1, 8, 2, 1, '2000-2999', 0.19, 100, NULL, NULL),
(85, 1, 8, 2, 1, '3000-4999', 0.17, 100, NULL, NULL),
(86, 1, 8, 2, 1, '5000-9999', 0.16, 100, NULL, NULL),
(87, 1, 8, 2, 1, '10000-19999', 0.14, 100, NULL, NULL),
(88, 1, 8, 2, 1, '20000-49999', 0.14, 100, NULL, NULL),
(89, 1, 8, 2, 1, '50000-99999', 0.14, 100, NULL, NULL),
(90, 1, 8, 2, 1, '100000+', 0.12, 100, NULL, NULL),
(91, 1, 15, 2, 1, '1-4', 6.25, 0, NULL, NULL),
(92, 1, 15, 2, 1, '5-9', 5.35, 0, NULL, NULL),
(93, 1, 15, 2, 1, '10-19', 3.68, 0, NULL, NULL),
(94, 1, 15, 2, 1, '20-49', 3.01, 0, NULL, NULL),
(95, 1, 15, 2, 1, '50-74', 1.10, 0, NULL, NULL),
(96, 1, 15, 2, 1, '75-99', 1.05, 0, NULL, NULL),
(97, 1, 15, 2, 1, '100-199', 0.80, 100, NULL, NULL),
(98, 1, 15, 2, 1, '200-299', 0.47, 100, NULL, NULL),
(99, 1, 15, 2, 1, '300-499', 0.43, 100, NULL, NULL),
(100, 1, 15, 2, 1, '500-999', 0.39, 100, NULL, NULL),
(101, 1, 15, 2, 1, '1000-1999', 0.26, 100, NULL, NULL),
(102, 1, 15, 2, 1, '2000-2999', 0.26, 100, NULL, NULL),
(103, 1, 15, 2, 1, '3000-4999', 0.26, 100, NULL, NULL),
(104, 1, 15, 2, 1, '5000-9999', 0.21, 100, NULL, NULL),
(105, 1, 15, 2, 1, '10000-19999', 0.20, 100, NULL, NULL),
(106, 1, 15, 2, 1, '20000-49999', 0.20, 100, NULL, NULL),
(107, 1, 15, 2, 1, '50000-99999', 0.20, 100, NULL, NULL),
(108, 1, 15, 2, 1, '100000+', 0.15, 100, NULL, NULL),
(109, 1, 12, 2, 1, '1-4', 0.00, 0, NULL, NULL),
(110, 1, 12, 2, 1, '5-9', 0.00, 0, NULL, NULL),
(111, 1, 12, 2, 1, '10-19', 0.00, 0, NULL, NULL),
(112, 1, 12, 2, 1, '20-49', 0.00, 0, NULL, NULL),
(113, 1, 12, 2, 1, '50-74', 3.50, 0, NULL, NULL),
(114, 1, 12, 2, 1, '75-99', 2.99, 0, NULL, NULL),
(115, 1, 12, 2, 1, '100-199', 1.39, 100, NULL, NULL),
(116, 1, 12, 2, 1, '200-299', 0.95, 100, NULL, NULL),
(117, 1, 12, 2, 1, '300-499', 0.84, 100, NULL, NULL),
(118, 1, 12, 2, 1, '500-999', 0.71, 100, NULL, NULL),
(119, 1, 12, 2, 1, '1000-1999', 0.59, 100, NULL, NULL),
(120, 1, 12, 2, 1, '2000-2999', 0.41, 100, NULL, NULL),
(121, 1, 12, 2, 1, '3000-4999', 0.31, 100, NULL, NULL),
(122, 1, 12, 2, 1, '5000-9999', 0.31, 100, NULL, NULL),
(123, 1, 12, 2, 1, '10000-19999', 0.31, 100, NULL, NULL),
(124, 1, 12, 2, 1, '20000-49999', 0.31, 100, NULL, NULL),
(125, 1, 12, 2, 1, '50000-99999', 0.31, 100, NULL, NULL),
(126, 1, 12, 2, 1, '100000+', 0.31, 100, NULL, NULL),
(127, 1, 14, 2, 1, '1-4', 0.00, 0, NULL, NULL),
(128, 1, 14, 2, 1, '5-9', 0.00, 0, NULL, NULL),
(129, 1, 14, 2, 1, '10-19', 0.00, 0, NULL, NULL),
(130, 1, 14, 2, 1, '20-49', 4.53, 0, NULL, NULL),
(131, 1, 14, 2, 1, '50-74', 2.35, 0, NULL, NULL),
(132, 1, 14, 2, 1, '75-99', 1.27, 0, NULL, NULL),
(133, 1, 14, 2, 1, '100-199', 2.69, 100, NULL, NULL),
(134, 1, 14, 2, 1, '200-299', 1.50, 100, NULL, NULL),
(135, 1, 14, 2, 1, '300-499', 0.89, 100, NULL, NULL),
(136, 1, 14, 2, 1, '500-999', 0.45, 100, NULL, NULL),
(137, 1, 14, 2, 1, '1000-1999', 0.32, 100, NULL, NULL),
(138, 1, 14, 2, 1, '2000-2999', 0.32, 100, NULL, NULL),
(139, 1, 14, 2, 1, '3000-4999', 0.32, 100, NULL, NULL),
(140, 1, 14, 2, 1, '5000-9999', 0.30, 100, NULL, NULL),
(141, 1, 14, 2, 1, '10000-19999', 0.29, 100, NULL, NULL),
(142, 1, 14, 2, 1, '20000-49999', 0.29, 100, NULL, NULL),
(143, 1, 14, 2, 1, '50000-99999', 0.29, 100, NULL, NULL),
(144, 1, 14, 2, 1, '100000+', 0.21, 100, NULL, NULL),
(145, 1, 4, 2, 1, '1-4', 2.45, 0, NULL, NULL),
(146, 1, 4, 2, 1, '5-9', 1.99, 0, NULL, NULL),
(147, 1, 4, 2, 1, '10-19', 1.59, 0, NULL, NULL),
(148, 1, 4, 2, 1, '20-49', 1.40, 0, NULL, NULL),
(149, 1, 4, 2, 1, '50-74', 0.85, 0, NULL, NULL),
(150, 1, 4, 2, 1, '75-99', 0.85, 0, NULL, NULL),
(151, 1, 4, 2, 1, '100-199', 0.55, 100, NULL, NULL),
(152, 1, 4, 2, 1, '200-299', 0.45, 100, NULL, NULL),
(153, 1, 4, 2, 1, '300-499', 0.38, 100, NULL, NULL),
(154, 1, 4, 2, 1, '500-999', 0.30, 100, NULL, NULL),
(155, 1, 4, 2, 1, '1000-1999', 0.20, 100, NULL, NULL),
(156, 1, 4, 2, 1, '2000-2999', 0.19, 100, NULL, NULL),
(157, 1, 4, 2, 1, '3000-4999', 0.17, 100, NULL, NULL),
(158, 1, 4, 2, 1, '5000-9999', 0.16, 100, NULL, NULL),
(159, 1, 4, 2, 1, '10000-19999', 0.14, 100, NULL, NULL),
(160, 1, 4, 2, 1, '20000-49999', 0.12, 100, NULL, NULL),
(161, 1, 4, 2, 1, '50000-99999', 0.12, 100, NULL, NULL),
(162, 1, 4, 2, 1, '100000+', 0.12, 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE IF NOT EXISTS `product_sizes` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `ref` varchar(20) NOT NULL,
  `product_category_id` int(4) NOT NULL,
  `product_id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `image` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `name`, `ref`, `product_category_id`, `product_id`, `type`, `image`, `status`, `created`, `updated`) VALUES
(1, '1/4 Inch', 'inch_1_4', 1, 3, 'Most Classy', 'ProdSize7248502015-03-02.png', 1, '2015-02-05 17:35:37', '2015-03-02 16:29:51'),
(2, '1/2 Inch', '1/2 Inch', 1, 3, 'Most Popular', 'ProdSize7539592015-03-02.png', 1, '2015-02-05 17:46:45', '2015-03-02 16:30:26'),
(3, '3 inch', '', 3, 3, '', 'ProdSize9991892015-02-13.png', 0, '2015-02-05 18:01:26', '2015-02-13 18:18:51'),
(4, '3/4 Inch', 'inch_3_4', 1, 3, 'Limited Edition', 'ProdSize1475772015-03-02.png', 1, '2015-02-26 14:08:25', '2015-03-02 16:30:48'),
(5, '1 Inch', 'inch_1', 1, 3, 'Most Trending', 'ProdSize4349622015-03-02.png', 1, '2015-02-26 14:09:07', '2015-03-02 16:31:39'),
(6, '1.5 Inch', 'inch_1_5', 1, 3, 'New Arrival', 'ProdSize2317492015-03-02.png', 1, '2015-02-26 14:09:29', '2015-03-04 14:27:54'),
(7, '2 Inch', 'inch_2', 1, 3, 'New Arrival', 'ProdSize6549712015-03-02.png', 1, '2015-02-26 14:09:46', '2015-03-02 16:32:06'),
(8, '1/4 Inch', 'inch_1_4', 1, 8, 'Most Classy', 'ProdSize7248502015-03-02.png', 1, '2015-02-05 17:35:37', '2015-03-02 16:29:51'),
(9, '1/2 Inch', '1/2 Inch', 1, 8, 'Most Popular', 'ProdSize7539592015-03-02.png', 1, '2015-02-05 17:46:45', '2015-03-02 16:30:26'),
(10, '3/4 Inch', 'inch_3_4', 1, 8, 'Limited Edition', 'ProdSize1475772015-03-02.png', 1, '2015-02-26 14:08:25', '2015-03-02 16:30:48'),
(11, '1 Inch', 'inch_1', 1, 8, 'Most Trending', 'ProdSize4349622015-03-02.png', 1, '2015-02-26 14:09:07', '2015-03-02 16:31:39'),
(12, '1.5 Inch', 'inch_1_5', 1, 8, 'New Arrival', 'ProdSize2317492015-03-02.png', 1, '2015-02-26 14:09:29', '2015-03-04 14:27:54'),
(13, '2 Inch', 'inch_2', 1, 8, 'New Arrival', 'ProdSize6549712015-03-02.png', 1, '2015-02-26 14:09:46', '2015-03-02 16:32:06'),
(14, '1/4 Inch', 'inch_1_4', 1, 10, 'Most Classy', 'ProdSize7248502015-03-02.png', 1, '2015-02-05 17:35:37', '2015-03-02 16:29:51'),
(15, '1/2 Inch', '1/2 Inch', 1, 10, 'Most Popular', 'ProdSize7539592015-03-02.png', 1, '2015-02-05 17:46:45', '2015-03-02 16:30:26'),
(16, '3/4 Inch', 'inch_3_4', 1, 10, 'Limited Edition', 'ProdSize1475772015-03-02.png', 1, '2015-02-26 14:08:25', '2015-03-02 16:30:48'),
(17, '1/4 Inch', 'inch_1_4', 1, 11, 'Most Classy', 'ProdSize7248502015-03-02.png', 1, '2015-02-05 17:35:37', '2015-03-02 16:29:51'),
(18, '1/2 Inch', '1/2 Inch', 1, 11, 'Most Popular', 'ProdSize7539592015-03-02.png', 1, '2015-02-05 17:46:45', '2015-03-31 21:03:12'),
(19, '3/4 Inch', 'inch_3_4', 1, 11, 'Limited Edition', 'ProdSize1475772015-03-02.png', 1, '2015-02-26 14:08:25', '2015-03-02 16:30:48'),
(20, '1 Inch', 'inch_1', 1, 11, 'Most Trending', 'ProdSize4349622015-03-02.png', 1, '2015-02-26 14:09:07', '2015-03-02 16:31:39'),
(21, '1.5 Inch', 'inch_1_5', 1, 11, 'New Arrival', 'ProdSize2317492015-03-02.png', 1, '2015-02-26 14:09:29', '2015-03-04 14:27:54'),
(22, '2 Inch', 'inch_2', 1, 11, 'New Arrival', 'ProdSize6549712015-03-02.png', 1, '2015-02-26 14:09:46', '2015-03-02 16:32:06'),
(23, '1/4 Inch', 'inch_1_4', 1, 12, 'Most Classy', 'ProdSize7248502015-03-02.png', 1, '2015-02-05 17:35:37', '2015-03-02 16:29:51'),
(24, '1/2 Inch', '1/2 Inch', 1, 12, 'Most Popular', 'ProdSize7539592015-03-02.png', 1, '2015-02-05 17:46:45', '2015-03-02 16:30:26'),
(25, '3/4 Inch', 'inch_3_4', 1, 12, 'Limited Edition', 'ProdSize1475772015-03-02.png', 1, '2015-02-26 14:08:25', '2015-03-02 16:30:48'),
(26, '1 Inch', 'inch_1', 1, 12, 'Most Trending', 'ProdSize4349622015-03-02.png', 1, '2015-02-26 14:09:07', '2015-03-02 16:31:39'),
(27, '1.5 Inch', 'inch_1_5', 1, 12, 'New Arrival', 'ProdSize2317492015-03-02.png', 1, '2015-02-26 14:09:29', '2015-03-04 14:27:54'),
(28, '2 Inch', 'inch_2', 1, 12, 'New Arrival', 'ProdSize6549712015-03-02.png', 1, '2015-02-26 14:09:46', '2015-03-02 16:32:06'),
(29, '1/4 Inch', 'inch_1_4', 1, 13, 'Most Classy', 'ProdSize7248502015-03-02.png', 1, '2015-02-05 17:35:37', '2015-03-02 16:29:51'),
(30, '1/2 Inch', '1/2 Inch', 1, 13, 'Most Popular', 'ProdSize7539592015-03-02.png', 1, '2015-02-05 17:46:45', '2015-03-02 16:30:26'),
(31, '3/4 Inch', 'inch_3_4', 1, 13, 'Limited Edition', 'ProdSize1475772015-03-02.png', 1, '2015-02-26 14:08:25', '2015-03-02 16:30:48'),
(32, '1 Inch', 'inch_1', 1, 13, 'Most Trending', 'ProdSize4349622015-03-02.png', 1, '2015-02-26 14:09:07', '2015-03-02 16:31:39'),
(33, '1.5 Inch', 'inch_1_5', 1, 13, 'New Arrival', 'ProdSize2317492015-03-02.png', 1, '2015-02-26 14:09:29', '2015-03-04 14:27:54'),
(34, '2 Inch', 'inch_2', 1, 13, 'New Arrival', 'ProdSize6549712015-03-02.png', 1, '2015-02-26 14:09:46', '2015-03-02 16:32:06'),
(35, '1/4 Inch', 'inch_1_4', 1, 14, 'Most Classy', 'ProdSize7248502015-03-02.png', 1, '2015-02-05 17:35:37', '2015-03-02 16:29:51'),
(36, '1/2 Inch', '1/2 Inch', 1, 14, 'Most Popular', 'ProdSize7539592015-03-02.png', 1, '2015-02-05 17:46:45', '2015-03-02 16:30:26'),
(37, '3/4 Inch', 'inch_3_4', 1, 14, 'Limited Edition', 'ProdSize1475772015-03-02.png', 1, '2015-02-26 14:08:25', '2015-03-02 16:30:48'),
(38, '1 Inch', 'inch_1', 1, 14, 'Most Trending', 'ProdSize4349622015-03-02.png', 1, '2015-02-26 14:09:07', '2015-03-02 16:31:39'),
(39, '1.5 Inch', 'inch_1_5', 1, 14, 'New Arrival', 'ProdSize2317492015-03-02.png', 1, '2015-02-26 14:09:29', '2015-03-05 12:53:09'),
(40, '2 Inch', 'inch_2', 1, 14, 'New Arrival', 'ProdSize6549712015-03-02.png', 1, '2015-02-26 14:09:46', '2015-03-02 16:32:06'),
(41, '1/4 Inch', 'inch_1_4', 1, 15, 'Most Classy', 'ProdSize7248502015-03-02.png', 1, '2015-02-05 17:35:37', '2015-03-02 16:29:51'),
(42, '1/2 Inch', '1/2 Inch', 1, 15, 'Most Popular', 'ProdSize7539592015-03-02.png', 1, '2015-02-05 17:46:45', '2015-03-02 16:30:26'),
(43, '3/4 Inch', 'inch_3_4', 1, 15, 'Limited Edition', 'ProdSize1475772015-03-02.png', 1, '2015-02-26 14:08:25', '2015-03-02 16:30:48'),
(44, '1 Inch', 'inch_1', 1, 15, 'Most Trending', 'ProdSize4349622015-03-02.png', 1, '2015-02-26 14:09:07', '2015-03-02 16:31:39'),
(45, '1.5 Inch', 'inch_1_5', 1, 15, 'New Arrival', 'ProdSize2317492015-03-02.png', 1, '2015-02-26 14:09:29', '2015-03-04 14:27:54'),
(46, '2 Inch', 'inch_2', 1, 15, 'New Arrival', 'ProdSize6549712015-03-02.png', 1, '2015-02-26 14:09:46', '2015-03-02 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_styles`
--

CREATE TABLE IF NOT EXISTS `product_styles` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `product_category_id` int(4) NOT NULL,
  `product_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `image` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product_styles`
--

INSERT INTO `product_styles` (`id`, `name`, `product_category_id`, `product_id`, `type`, `image`, `status`, `created`, `updated`) VALUES
(1, 'Solid', 1, 3, '', 'ProdStyle3759882015-02-05.png', 1, '2015-02-05 17:35:59', '2015-02-05 18:39:57'),
(2, 'Segmented', 1, 3, '', 'ProdStyle9982112015-02-05.png', 1, '2015-02-05 17:47:06', '2015-02-05 18:40:04'),
(3, 'Solid', 3, 4, '', 'ProdStyle9718122015-02-13.png', 1, '2015-02-05 18:17:24', '2015-02-18 17:50:54'),
(4, 'Swirl', 1, 3, '', 'ProdStyle9861452015-02-27.png', 1, '2015-02-27 12:53:32', '2015-03-04 14:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `prod_days`
--

CREATE TABLE IF NOT EXISTS `prod_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `days` tinyint(2) NOT NULL,
  `title` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `prod_days`
--

INSERT INTO `prod_days` (`id`, `days`, `title`) VALUES
(1, 1, '1 Day'),
(2, 2, '2 Days'),
(3, 4, '4 Days'),
(4, 7, '7 Days');

-- --------------------------------------------------------

--
-- Table structure for table `quantities`
--

CREATE TABLE IF NOT EXISTS `quantities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `quantities`
--

INSERT INTO `quantities` (`id`, `product_category_id`, `name`, `value`, `status`, `is_deleted`, `created`, `updated`) VALUES
(1, 1, '1-19', 20, 1, 0, '2015-02-17 13:00:36', '2015-03-10 13:59:40'),
(2, 1, '20-49', 50, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:00:01'),
(3, 1, '50-74', 75, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:00:20'),
(4, 1, '75-99', 99, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:00:54'),
(5, 1, '100-199', 100, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:01:18'),
(6, 1, '200-299', 200, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:01:59'),
(7, 1, '300-499', 300, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:03:12'),
(8, 1, '500-999', 500, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:04:11'),
(9, 1, '1000-1999', 1000, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:04:16'),
(10, 1, '2000-2999', 2000, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:04:24'),
(11, 1, '3000-4999', 3000, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:04:44'),
(12, 1, '5000+', 5000, 1, 0, '2015-02-17 13:00:36', '2015-03-10 14:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_regions`
--

CREATE TABLE IF NOT EXISTS `shipping_regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `shipping_regions`
--

INSERT INTO `shipping_regions` (`id`, `name`, `status`, `is_deleted`) VALUES
(1, 'Alabama', 1, 0),
(2, 'Alaska', 1, 0),
(3, 'Arizona', 1, 0),
(4, 'Arkansas', 1, 0),
(5, 'California', 1, 0),
(6, 'Colorado', 1, 0),
(7, 'Connecticut', 1, 0),
(8, 'Delaware', 1, 0),
(9, 'District of Columbia', 1, 0),
(10, 'Florida', 1, 0),
(11, 'Georgia', 1, 0),
(12, 'Hawaii', 1, 0),
(13, 'Idaho', 1, 0),
(14, 'Illinois', 1, 0),
(15, 'Indiana', 1, 0),
(16, 'Iowa', 1, 0),
(17, 'Kansas', 1, 0),
(18, 'Kentucky', 1, 0),
(19, 'Louisiana', 1, 0),
(20, 'Maine', 1, 0),
(21, 'Maryland', 1, 0),
(22, 'Massachusetts', 1, 0),
(23, 'Michigan', 1, 0),
(24, 'Minnesota', 1, 0),
(25, 'Mississippi', 1, 0),
(26, 'Missouri', 1, 0),
(27, 'Montana', 1, 0),
(28, 'Nebraska', 1, 0),
(29, 'Nevada', 1, 0),
(30, 'New Hampshire', 1, 0),
(31, 'New Jersey', 1, 0),
(32, 'New Mexico', 1, 0),
(33, 'New York', 1, 0),
(34, 'North Carolina', 1, 0),
(35, 'North Dakota', 1, 0),
(36, 'Ohio', 1, 0),
(37, 'Oklahoma', 1, 0),
(38, 'Oregon', 1, 0),
(39, 'Pennsylvania', 1, 0),
(40, 'Puerto Rico', 1, 0),
(41, 'Rhode Island', 1, 0),
(42, 'South Carolina', 1, 0),
(43, 'South Dakota', 1, 0),
(44, 'Tennessee', 1, 0),
(45, 'Texas', 1, 0),
(46, 'Utah', 1, 0),
(47, 'Vermont', 1, 0),
(48, 'Virginia', 1, 0),
(49, 'Washington', 1, 0),
(50, 'West Virginia', 1, 0),
(51, 'Wisconsin', 1, 0),
(52, 'Wyoming', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ship_bill_addresses`
--

CREATE TABLE IF NOT EXISTS `ship_bill_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ship_company_name` varchar(50) NOT NULL,
  `ship_first_name` varchar(50) NOT NULL,
  `ship_last_name` varchar(50) NOT NULL,
  `ship_address` varchar(100) NOT NULL,
  `ship_suite` varchar(50) NOT NULL,
  `ship_city` varchar(50) NOT NULL,
  `ship_state` varchar(50) NOT NULL,
  `ship_state2` varchar(50) NOT NULL,
  `ship_zipcode` varchar(20) NOT NULL,
  `ship_country` varchar(50) NOT NULL,
  `ship_phone` varchar(20) NOT NULL,
  `ship_faxnumber` varchar(20) NOT NULL,
  `ship_emailaddress` varchar(50) NOT NULL,
  `bill_company_name` varchar(50) NOT NULL,
  `bill_first_name` varchar(50) NOT NULL,
  `bill_last_name` varchar(50) NOT NULL,
  `bill_address` varchar(100) NOT NULL,
  `bill_suite` varchar(50) NOT NULL,
  `bill_city` varchar(50) NOT NULL,
  `bill_state` varchar(50) NOT NULL,
  `bill_state2` varchar(50) NOT NULL,
  `bill_zipcode` varchar(20) NOT NULL,
  `bill_country` varchar(50) NOT NULL,
  `bill_phone` varchar(20) NOT NULL,
  `bill_faxnumber` varchar(20) NOT NULL,
  `bill_emailaddress` varchar(50) NOT NULL,
  `confirmShipping` tinyint(1) NOT NULL,
  `taxnumber` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ship_bill_addresses`
--

INSERT INTO `ship_bill_addresses` (`id`, `user_id`, `ship_company_name`, `ship_first_name`, `ship_last_name`, `ship_address`, `ship_suite`, `ship_city`, `ship_state`, `ship_state2`, `ship_zipcode`, `ship_country`, `ship_phone`, `ship_faxnumber`, `ship_emailaddress`, `bill_company_name`, `bill_first_name`, `bill_last_name`, `bill_address`, `bill_suite`, `bill_city`, `bill_state`, `bill_state2`, `bill_zipcode`, `bill_country`, `bill_phone`, `bill_faxnumber`, `bill_emailaddress`, `confirmShipping`, `taxnumber`, `created`, `updated`) VALUES
(1, 4, '89itworld', 'Praveen', 'Dabral', 'Patel Nagar', 'Suite', 'Dehradun', '', 'Uttarakhand', '248007', 'IN', '8989898989', '8989', 'praveen@89itworld.com', '89itworld', 'Praveen', 'Dabral', 'Patel Nagar', 'Suite', 'Dehradun', '', 'Uttarakhand', '248007', 'IN', '8989898989', '8989', 'praveen@89itworld.com', 1, '', '2015-04-13 09:50:12', '2015-04-20 13:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `ship_time_dummy_prices`
--

CREATE TABLE IF NOT EXISTS `ship_time_dummy_prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(6) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_size_id` int(11) NOT NULL,
  `product_style_id` int(11) NOT NULL,
  `meta_day_id` int(1) NOT NULL,
  `price` double(11,2) DEFAULT NULL,
  `qty_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `ship_time_dummy_prices`
--

INSERT INTO `ship_time_dummy_prices` (`id`, `product_category_id`, `product_id`, `product_size_id`, `product_style_id`, `meta_day_id`, `price`, `qty_id`, `status`, `is_deleted`, `modified`) VALUES
(1, 1, 3, 10, 2, 1, 4.00, 4, 1, 0, '2015-03-12 07:17:00'),
(2, 2, 3, 6, 2, 7, 15.00, 11, 1, 0, '2015-03-12 07:17:00'),
(3, 3, 11, 26, 1, 3, 42.99, 5, 1, 0, '2015-03-12 07:17:00'),
(4, 3, 5, 21, 1, 7, 80.00, 7, 1, 0, '2015-03-12 07:17:00'),
(5, 1, 10, 21, 4, 2, 3.45, 5, 1, 0, '2015-03-12 07:17:00'),
(6, 1, 11, 16, 2, 3, 2.54, 6, 1, 0, '2015-03-12 07:17:00'),
(7, 1, 8, 29, 2, 4, 3.98, 11, 1, 0, '2015-03-12 07:17:00'),
(8, 1, 12, 24, 1, 5, 2.54, 2, 1, 0, '2015-03-12 07:17:00'),
(9, 1, 14, 17, 1, 6, 2.34, 2, 1, 0, '2015-03-12 07:17:00'),
(10, 1, 8, 4, 4, 7, 2.00, 1, 1, 0, '2015-03-12 07:17:00'),
(11, 2, 15, 16, 2, 1, 4.00, 11, 1, 0, '2015-03-12 07:17:00'),
(12, 2, 15, 38, 1, 2, 3.45, 3, 1, 0, '2015-03-12 07:17:00'),
(13, 2, 8, 9, 4, 3, 2.54, 6, 1, 0, '2015-03-12 07:17:00'),
(14, 2, 12, 18, 4, 4, 3.98, 7, 1, 0, '2015-03-12 07:17:00'),
(15, 2, 14, 31, 2, 5, 2.54, 4, 1, 0, '2015-03-12 07:17:00'),
(16, 2, 10, 6, 1, 6, 2.34, 11, 1, 0, '2015-03-12 07:17:00'),
(17, 3, 10, 12, 1, 1, 4.00, 6, 1, 0, '2015-03-12 07:17:00'),
(18, 3, 11, 40, 2, 2, 3.80, 10, 1, 0, '2015-03-12 07:03:32'),
(19, 3, 4, 5, 2, 4, 3.50, 9, 1, 0, '2015-03-12 07:17:00'),
(20, 3, 15, 11, 2, 5, 3.10, 12, 1, 0, '2015-03-12 07:17:00'),
(21, 3, 12, 18, 1, 6, 2.50, 10, 1, 0, '2015-03-12 07:17:00'),
(22, 1, 3, 3, 1, 1, 2.00, 1, 1, 0, '2015-03-12 07:31:36'),
(23, 1, 3, 3, 1, 2, 2.00, 1, 1, 0, '2015-03-12 11:48:54'),
(24, 1, 3, 2, 1, 4, 4.69, 1, 1, 0, '2015-03-12 12:08:15'),
(25, 1, 3, 2, 1, 3, 6.94, 1, 1, 0, '2015-03-12 12:07:44'),
(26, 1, 3, 2, 1, 2, 19.94, 1, 1, 0, '2015-03-12 12:05:24'),
(27, 1, 3, 2, 1, 1, 38.94, 1, 1, 0, '2015-03-12 12:04:49'),
(28, 1, 3, 2, 1, 5, 30.89, 1, 1, 0, '2015-03-12 12:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `ship_time_prices`
--

CREATE TABLE IF NOT EXISTS `ship_time_prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(6) NOT NULL,
  `meta_day_id` int(1) NOT NULL,
  `price` double(11,2) DEFAULT NULL,
  `qty` int(6) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `ship_time_prices`
--

INSERT INTO `ship_time_prices` (`id`, `product_category_id`, `meta_day_id`, `price`, `qty`, `status`, `is_deleted`, `modified`) VALUES
(1, 1, 1, 4.00, 5, 1, 0, '2015-03-10 06:29:57'),
(2, 2, 7, 15.00, 50, 1, 0, '2015-02-16 05:07:29'),
(3, 3, 3, 42.99, 10, 1, 0, '2015-02-27 12:37:39'),
(4, 3, 7, 80.00, 105, 1, 0, '2015-02-12 09:36:45'),
(5, 1, 2, 3.45, 20, 1, 0, '2015-03-10 06:24:33'),
(6, 1, 3, 2.54, 30, 1, 0, '2015-03-10 06:24:33'),
(7, 1, 4, 3.98, 50, 1, 0, '2015-03-10 06:24:33'),
(8, 1, 5, 2.54, 100, 1, 0, '2015-03-10 06:24:33'),
(9, 1, 6, 2.34, 200, 1, 0, '2015-03-10 06:24:33'),
(10, 1, 7, 2.00, 200, 1, 0, '2015-03-10 06:30:48'),
(11, 2, 1, 4.00, 5, 1, 0, '2015-03-10 00:59:57'),
(12, 2, 2, 3.45, 20, 1, 0, '2015-03-10 00:54:33'),
(13, 2, 3, 2.54, 30, 1, 0, '2015-03-10 00:54:33'),
(14, 2, 4, 3.98, 50, 1, 0, '2015-03-10 00:54:33'),
(15, 2, 5, 2.54, 100, 1, 0, '2015-03-10 00:54:33'),
(16, 2, 6, 2.34, 200, 1, 0, '2015-03-10 00:54:33'),
(17, 3, 1, 4.00, 5, 1, 0, '2015-03-10 06:39:05'),
(18, 3, 2, 3.80, 10, 1, 0, '2015-03-10 06:39:05'),
(19, 3, 4, 3.50, 50, 1, 0, '2015-03-10 06:39:05'),
(20, 3, 5, 3.10, 100, 1, 0, '2015-03-10 06:39:05'),
(21, 3, 6, 2.50, 200, 1, 0, '2015-03-10 06:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `sub_tabs`
--

CREATE TABLE IF NOT EXISTS `sub_tabs` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tab_id` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `controller` varchar(200) NOT NULL,
  `action` varchar(200) NOT NULL,
  `description` text,
  `title` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sub_tabs`
--

INSERT INTO `sub_tabs` (`id`, `tab_id`, `name`, `slug`, `controller`, `action`, `description`, `title`, `status`, `created`, `updated`) VALUES
(1, 4, 'helloqqq', 'hello', 'homes', 'hello', 'helloooo', 'hello', 1, '2015-04-13 13:13:11', '2015-04-13 18:14:06'),
(2, 5, 'about us', 'aboutus', 'about', 'index', 'about', 'aboutus', 1, '2015-04-13 14:32:16', '2015-04-13 14:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `tabs`
--

CREATE TABLE IF NOT EXISTS `tabs` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `controller` varchar(200) NOT NULL,
  `action` varchar(200) NOT NULL,
  `description` text,
  `title` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tabs`
--

INSERT INTO `tabs` (`id`, `name`, `slug`, `controller`, `action`, `description`, `title`, `status`, `created`, `updated`) VALUES
(4, 'home', 'home', 'homes', 'index', 'homee', 'home', 1, '2015-04-13 12:45:25', '2015-04-13 18:12:18'),
(5, 'about', 'about', 'about', 'index', 'about us', 'about', 1, '2015-04-13 14:29:33', '2015-04-13 18:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `points` int(4) NOT NULL,
  `user_type` tinyint(2) NOT NULL,
  `verified` int(1) NOT NULL,
  `activation` varchar(100) NOT NULL,
  `socialid` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `country` char(2) NOT NULL,
  `zipcode` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0' COMMENT '"0"=>"Not Deleted", "1"=>"Deleted"',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `points`, `user_type`, `verified`, `activation`, `socialid`, `language`, `mobile`, `country`, `zipcode`, `address`, `is_active`, `is_deleted`, `updated`) VALUES
(1, 'Navneet', 'Joshi', 'navneet@89itworld.com', 'de58d52c0f25d2dc23c470f941c45c1918337931', 2, 1, 1, '', '123334356', '3', '9898234567', '', '248001', '', 0, 0, '2015-03-13 04:49:23'),
(2, 'Ankur', 'Chauhan', 'ankur@89itworld.com', 'ankur123', 4, 1, 1, '', '23534636', '4', '9891234567', '', '248001', '', 1, 0, '2015-01-30 22:48:17'),
(3, 'Test', '', 'test123@89itworld.com', '', 0, 2, 0, '', '', '', '1234567890', 'IN', '248001', 'Premnagar', 1, 0, '2015-01-30 06:20:54'),
(4, 'Praveen', '', 'praveen@89itworld.com', '', 0, 3, 0, '', '', '', '1231231234', 'ID', '248001', 'Address', 1, 0, '2015-04-15 07:05:12'),
(5, 'Dinesh', '', 'dinesh@89tiworld.com', '', 0, 2, 0, '', '', '', '1234567890', 'AQ', '34245', 'Antarctic Ocean', 1, 0, '2015-02-05 04:22:04'),
(6, 'Ankit', '', 'ankit@89itworld.com', '123456', 0, 2, 0, '', '', '', '89452348901', 'AX', '2346677', '', 1, 0, '2015-02-13 04:15:49'),
(7, 'Mahesh', '', 'mahesh@89itworld.com', '', 0, 2, 0, '', '', '', '9893489334', 'BS', '343245', '', 1, 0, '2015-02-05 04:20:48'),
(8, 'Sonam', '', 'sonam@89tiworld.com', '', 0, 2, 0, '', '', '', '1235678908', 'AT', '45435', 'Address', 1, 0, '2015-01-31 05:13:34'),
(9, 'Sumit', '', 'sumit@89itworld.com', '', 0, 2, 0, '', '', '', '4545456789', 'AL', '2346678', 'Address', 0, 0, '2015-02-13 04:08:57'),
(10, 'Narender', '', 'narender@89itworld.com', '', 0, 2, 0, '', '', '', '3245344645', 'AO', '34435', 'Address New', 0, 0, '2015-01-31 05:13:34'),
(11, 'Suresh', '', 'suresh@89itworld.com', '', 0, 2, 0, '', '', '', '8934894389', 'AF', '248001', 'New Address', 1, 0, '2015-01-30 04:18:15'),
(12, 'Suraj', '', 'testetst@89itworld.com', '', 0, 1, 0, '81422618811', '', '', '1234567890', 'LV', '2346677', 'Premnagar', 1, 0, '2015-02-27 11:13:05'),
(13, 'Test', '', 'test@89itworld.com', '', 0, 2, 0, '', '', '', '9999999999', 'AE', '', 'Test', 1, 0, '2015-03-05 07:22:56'),
(14, 'TestingUser', '', 'tsdfgdsfjh@89itworld.com', '', 0, 1, 0, '91422619103', '', '', '1234567890', 'AI', '248008', 'New Address', 1, 0, '2015-01-30 06:37:59'),
(15, 'Testing', '', 'sfdbcfgnvhm@89itworld.com', '123456', 0, 2, 1, '101422619709', '', '', '34287324879', 'AE', '248001', 'Rajpur Road', 1, 0, '2015-01-30 22:58:13'),
(16, 'Amuk', '', 'amuk@89itworld.com', '123456', 0, 2, 1, '91422678521', '', '', '1234567890', 'AG', '248007', 'Testing Address', 1, 0, '2015-01-30 22:59:33'),
(18, 'Admin', '', 'admin@wristband.com', 'bb42c97ee9e038a4e62ab8e523a7931f61813213', 0, 1, 0, '91422882542', '', '', '9485678746', 'US', '235685', '', 1, 0, '2015-02-13 03:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE IF NOT EXISTS `websites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `domain` varchar(255) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `name`, `domain`, `slug`, `status`, `created`) VALUES
(1, '89itworld', 'http://www.89itworld.com/', NULL, 1, '2015-04-15 18:23:23'),
(2, 'panda', 'https://www.pandacashback.com/', NULL, 1, '2015-04-15 18:23:38');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
