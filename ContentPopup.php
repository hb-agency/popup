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
 * @copyright  Winans Creative 2010
 * @author     Blair Winans <blair@winanscreative.com>
 * @package    Frontend
 * @license    LGPL
 * @filesource
 */


/**
 * Class ContentPopup
 *
 * Front end content element "popup".
 * @copyright  Blair Winans 2010
 * @author     Blair Winans <blair@winanscreative.com>
 * @package    Controller
 */
class ContentPopup extends ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	 protected $strTemplate = 'ce_popup_text';

	/**
	 * Generate content element
	 */
	protected function compile()
	{
	
		//Basic Universal Settings
		
		//Set window size
		$windowSize = deserialize($this->windowSize);
		$windowWidth = (strlen($windowSize[0])) ? $windowSize[0] : '600';
		$windowHeight = (strlen($windowSize[1])) ? $windowSize[1] : '450';
	
		//Popup with Alias
		if($this->popType == 'poparticle')
		{
			if (TL_MODE == 'BE')
			{
				$this->strTemplate = 'be_wildcard';
				$this->Template = new BackendTemplate($this->strTemplate);
				$this->Template->wildcard = '### POPUP WINDOW ARTICLE ALIAS ###';
				$this->Template->title = $this->headline;
			} else
			{
			
				$this->strTemplate = 'ce_popup_alias';
				$this->Template = new FrontendTemplate($this->strTemplate);
				$this->Template->content = $this->getArticle($this->articleAlias, false, true);
			}
		}
		
		//Popup with Content Element
		elseif($this->popType == 'popcontent')
		{
			if (TL_MODE == 'BE')
			{
				$this->strTemplate = 'be_wildcard';
				$this->Template = new BackendTemplate($this->strTemplate);
				$this->Template->wildcard = '### POPUP WINDOW CONTENT ALIAS ###';
				$this->Template->title = $this->headline;
			} else
			{	
				$this->strTemplate = 'ce_popup_alias';
				$this->Template = new FrontendTemplate($this->strTemplate);
				$this->Template->content = $this->getContentElement($this->cteAlias);
			}
			
		}
		
		//Popup with Page (iframe)
		elseif($this->popType == 'poppageiframe')
		{
			if (TL_MODE == 'BE')
			{
				$this->strTemplate = 'be_wildcard';
				$this->Template = new BackendTemplate($this->strTemplate);
				$this->Template->wildcard = '### POPUP WINDOW PAGE IFRAME ###';
				$this->Template->title = $this->headline;
			} else
			{

				$this->strTemplate = 'ce_popup_iframe';
				$this->Template = new FrontendTemplate($this->strTemplate);
				$this->Template->href = $this->url;
			}
		}
		
		//Popup Default (Text Element)
		else
		{
			if (TL_MODE == 'BE')
			{
				$this->strTemplate = 'be_wildcard';
				$this->Template = new BackendTemplate($this->strTemplate);
				$this->Template->wildcard = '### POPUP WINDOW TEXT ###';
				$this->Template->title = $this->headline;
			}
			else
			{
				
				// Popup content
				$this->import('String');

				// Clean RTE output
				$this->Template->text = str_ireplace
				(
					array('<u>', '</u>', '</p>', '<br /><br />', ' target="_self"'),
					array('<span style="text-decoration:underline;">', '</span>', "</p>\n", "<br /><br />\n", ''),
					$this->String->encodeEmail($this->text)
				);
				
				$this->Template->addImage = false;

				// Add popup content image
				if ($this->addImage && strlen($this->singleSRC) && is_file(TL_ROOT . '/' . $this->singleSRC))
				{
					$this->addImageToTemplate($this->Template, $this->arrData);
				}
				
			}
			
		}//end Elements
		
		

		
		//Basic Link Settings
		$embed = explode('%s', $this->embed);

		if (!strlen($this->linkTitle))
		{
			$this->linkTitle = 'Click for Popup';
		}
		$this->Template->contentid = 'mb_popup' . $this->id;
		$this->Template->embed_pre = $embed[0];
		$this->Template->embed_post = $embed[1];
		$this->Template->linkTitle = specialchars($this->linkTitle);
		$this->Template->windowWidth = $windowWidth;
		$this->Template->windowHeight = $windowHeight;
		
		//Basic Linked Image Settings
		$this->Template->linkImage = false;
				
		// Use an image instead of the title
		if ($this->linkImage && strlen($this->linkSingleSRC) && is_file(TL_ROOT . '/' . $this->linkSingleSRC))
		{
			
			$this->Template->linkImage = true;
			
			$objFile = new File($this->linkSingleSRC);

			if ($objFile->isGdImage)
			{
				$size = deserialize($this->linkSize);
				$intMaxWidth = (TL_MODE == 'BE') ? 320 : $GLOBALS['TL_CONFIG']['maxImageWidth'];

				// Adjust image size
				if ($intMaxWidth > 0  && ($size[0] > $intMaxWidth || (!$size[0] && $objFile->width > $intMaxWidth)))
				{
					$size[0] = $intMaxWidth;
					$size[1] = floor($intMaxWidth * $objFile->height / $objFile->width);
				}

				$src = $this->getImage($this->urlEncode($this->linkSingleSRC), $size[0], $size[1]);

				if (($imgSize = @getimagesize(TL_ROOT . '/' . $src)) !== false)
				{
					$this->Template->imgSize = ' ' . $imgSize[3];
				}

				$this->Template->linkSrc = $src;
				$this->Template->linkAlt = specialchars($this->linkAlt);
				$this->Template->linkCaption = $this->linkCaption;
			}
		}
		
		

	}//end Compile
	

}

?>
