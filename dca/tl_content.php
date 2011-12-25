<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  2009 
 * @author     blair@winanscreative.com 
 * @package    Popup
 * @license    GPL 
 * @filesource
 */


/**
 * Table tl_content 
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] 		= 'popType';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][]	    = 'linkImage';
$GLOBALS['TL_DCA']['tl_content']['palettes']['popup'] 				= '{type_legend},type,popType';
$GLOBALS['TL_DCA']['tl_content']['palettes']['popuppoptext'] 		= '{type_legend},type,popType,headline,windowSize;{link_legend},linkTitle,embed;{imglink_legend:hide},linkImage;{text_legend},text;{image_legend},addImage;{protected_legend:hide},protected;{expert_legend},{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['popuppoparticle'] 	= '{type_legend},type,popType,headline,windowSize;{link_legend},linkTitle,embed;{imglink_legend:hide},linkImage;{include_legend},articleAlias;{protected_legend:hide},protected';
$GLOBALS['TL_DCA']['tl_content']['palettes']['popuppopcontent'] 	= '{type_legend},type,popType,headline,windowSize;{link_legend},linkTitle,embed;{imglink_legend:hide},linkImage;{include_legend},cteAlias;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['popuppoppageiframe'] 	= '{type_legend},type,popType,headline,windowSize;{link_legend},url,linkTitle,embed;{imglink_legend:hide},linkImage;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


$GLOBALS['TL_DCA']['tl_content']['subpalettes']['linkImage']			= 'linkSingleSRC,linkAlt,linkSize,linkCaption';

// Subpalettes


// Fields


$GLOBALS['TL_DCA']['tl_content']['fields']['popType'] = array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['popType'],
		'default'                 => 'poptext',
		'exclude'                 => true,
		'inputType'               => 'radio',
		'options'                 => array('poptext', 'poparticle', 'popcontent', 'poppageiframe'),
		'reference'               => &$GLOBALS['TL_LANG']['tl_content'],
		'eval'                    => array('submitOnChange'=>true)
	);
	
$GLOBALS['TL_DCA']['tl_content']['fields']['linkImage'] = array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['linkImage'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>true)
	);

$GLOBALS['TL_DCA']['tl_content']['fields']['linkSingleSRC'] = array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['linkSingleSRC'],
		'exclude'                 => true,
		'inputType'               => 'fileTree',
		'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'mandatory'=>true, 'tl_class'=>'clr')
	);
$GLOBALS['TL_DCA']['tl_content']['fields']['linkAlt'] = array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['linkAlt'],
		'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'text',
		'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'long')
	);
$GLOBALS['TL_DCA']['tl_content']['fields']['linkSize'] = array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['linkSize'],
		'exclude'                 => true,
		'inputType'               => 'imageSize',
		'options'                 => array('proportional', 'crop', 'box'),
		'reference'               => &$GLOBALS['TL_LANG']['MSC'],
		'eval'                    => array('rgxp'=>'digit', 'nospace'=>true, 'tl_class'=>'w50')
	);
	
$GLOBALS['TL_DCA']['tl_content']['fields']['linkCaption'] = array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['linkCaption'],
		'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'text',
		'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50')
	);

$GLOBALS['TL_DCA']['tl_content']['fields']['windowSize'] = array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['windowSize'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('multiple'=>true, 'size'=>2, 'rgxp'=>'digit', 'nospace'=>true, 'tl_class'=>'w50')
	);
		
?>