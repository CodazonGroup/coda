<?php
class Cdz_RevSlideshow_Block_Adminhtml_Revslideshow_Edit_Tab_Accordion_Navigation extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{

		$form = new Varien_Data_Form();
		$form->setFieldNameSuffix('navigation');
		$this->setForm($form);
		$fieldset = $form->addFieldset("revslideshow_navigation", array("legend"=>Mage::helper("revslideshow")->__("")));
		$nav_type = $fieldset->addField('navigationType', 'select', array(
			'label'     => Mage::helper('revslideshow')->__('Navigation Type'),
			'name'      => 'navigationType',
			'note'		=> Mage::helper('revslideshow')->__('Display type of the navigation bar (Default:none)'),
			'values'    => array(
				array(
					'value'     => 'none',
					'label'     => Mage::helper('revslideshow')->__('None'),
					),
				array(
					'value'     => 'bullet',
					'label'     => Mage::helper('revslideshow')->__('Bullet'),
					),
				array(
					'value'     => 'thumb',
					'label'     => Mage::helper('revslideshow')->__('Thumbnail'),
					),

				),
			));

		$nav_arrow = $fieldset->addField('navigationArrows', 'select', array(
			'label'     => Mage::helper('revslideshow')->__('Navigation Arrows'),
			'name'      => 'navigationArrows',
			'note'		=> Mage::helper('revslideshow')->__('Display position of the Navigation Arrows (Default: "nexttobullets")'),
			'values'    => array(
				array(
					'value'     => 'nexttobullets',
					'label'     => Mage::helper('revslideshow')->__('Next To Bullets'),
					),
				array(
					'value'     => 'solo',
					'label'     => Mage::helper('revslideshow')->__('Independent Positioned'),
					)	   					   
				),
			));

		$nav_style = $fieldset->addField('navigationStyle', 'select', array(
			'label'     => Mage::helper('revslideshow')->__('Navigation Style'),
			'name'      => 'navigationStyle',
			'note'		=> Mage::helper('revslideshow')->__('If NavigationType "bullet" selected'),
			'values'    => Mage::getModel('revslideshow/navigationstyle')->getOptionArray()
			));
		$fieldset->addField('navigationHAlign', 'select', array(
			'label'     => Mage::helper('revslideshow')->__('Horizontal Align of the Navigation'),
			'name'      => 'navigationHAlign',
			'note'		=> Mage::helper('revslideshow')->__('Horizontal Align of the Navigation'),
			'values'    => array(
				array(
					'value'     => 'left',
					'label'     => Mage::helper('revslideshow')->__('Left'),
					),
				array(
					'value'     => 'center',
					'label'     => Mage::helper('revslideshow')->__('Center'),
					),
				array(
					'value'     => 'right',
					'label'     => Mage::helper('revslideshow')->__('Right'),
					)	   					   
				),
			));
		$fieldset->addField('navigationVAlign', 'select', array(
			'label'     => Mage::helper('revslideshow')->__('Vertical Align of the Navigation'),
			'name'      => 'navigationVAlign',
			'note'		=> Mage::helper('revslideshow')->__('Vertical Align of the Navigation'),
			'values'    => array(
				array(
					'value'     => 'top',
					'label'     => Mage::helper('revslideshow')->__('Top'),
					),
				array(
					'value'     => 'center',
					'label'     => Mage::helper('revslideshow')->__('Center'),
					),
				array(
					'value'     => 'bottom',
					'label'     => Mage::helper('revslideshow')->__('Bottom'),
					)	   					   
				),
			));

		$fieldset->addField('navigationHOffset', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Navigation Offset Horizontal'),
			'name'      => 'navigationHOffset',
			'note'		=> Mage::helper('revslideshow')->__('The Offset position of the navigation depending on the aligned position'),
			))->setAfterElementHtml(' px');

		$fieldset->addField('navigationVOffset', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Navigation Offset Vertical'),
			'name'      => 'navigationVOffset',
			'note'		=> Mage::helper('revslideshow')->__('The Offset position of the navigation depending on the aligned position'),
			))->setAfterElementHtml(' px');
		


		$fieldset->addField('hideThumbs', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Hide Navitagion After'),
			'name'      => 'hideThumbs',
			'note'		=> Mage::helper('revslideshow')->__('Hide thumbs and navigation arrows, bullets after the predefined ms, 0 - Never hide Thumbs. 1000ms == 1 sec'),
			))->setAfterElementHtml(' ms');;
		
		$solo_arrow_hleft = $fieldset->addField('soloArrowLeftHaling', 'select', array(
			'label'     => Mage::helper('revslideshow')->__('Horizontal Align of the Arrow Left'),
			'name'      => 'soloArrowLeftHaling',
			'note'		=> Mage::helper('revslideshow')->__('Horizontal Align of the Arrow Left'),
			'values'    => array(
				array(
					'value'     => 'left',
					'label'     => Mage::helper('revslideshow')->__('Left'),
					),
				array(
					'value'     => 'center',
					'label'     => Mage::helper('revslideshow')->__('Center'),
					),
				array(
					'value'     => 'right',
					'label'     => Mage::helper('revslideshow')->__('Right'),
					)	   					   
				),
			));
		$solo_arrow_vleft = $fieldset->addField('soloArrowLeftValign', 'select', array(
			'label'     => Mage::helper('revslideshow')->__('Vertical Align of the Arrow Left'),
			'name'      => 'soloArrowLeftValign',
			'note'		=> Mage::helper('revslideshow')->__('Vertical Align of the Arrow Left'),
			'values'    => array(
				array(
					'value'     => 'top',
					'label'     => Mage::helper('revslideshow')->__('Top'),
					),
				array(
					'value'     => 'center',
					'label'     => Mage::helper('revslideshow')->__('Center'),
					),
				array(
					'value'     => 'bottom',
					'label'     => Mage::helper('revslideshow')->__('Bottom'),
					)	   					   
				),
			));	

		$solo_arrow_offset_hleft = $fieldset->addField('soloArrowLeftHOffset', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Arrow Left Offset Horizontal'),
			'name'      => 'soloArrowLeftHOffset',
			'note'		=> Mage::helper('revslideshow')->__('The Offset position of the arrow left depending on the aligned position'),
			))->setAfterElementHtml(' px');

		$solo_arrow_offset_vleft = $fieldset->addField('soloArrowLeftVOffset', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Arrow Left Offset Vertical'),
			'name'      => 'soloArrowLeftVOffset',
			'note'		=> Mage::helper('revslideshow')->__('The Offset position of the arrow left depending on the aligned position'),
			))->setAfterElementHtml(' px');				

		$solo_arrow_hright = $fieldset->addField('soloArrowRightHalign', 'select', array(
			'label'     => Mage::helper('revslideshow')->__('Horizontal Align of the Arrow Right'),
			'name'      => 'soloArrowRightHalign',
			'note'		=> Mage::helper('revslideshow')->__('Horizontal Align of the Arrow Right'),
			'values'    => array(
				array(
					'value'     => 'left',
					'label'     => Mage::helper('revslideshow')->__('Left'),
					),
				array(
					'value'     => 'center',
					'label'     => Mage::helper('revslideshow')->__('Center'),
					),
				array(
					'value'     => 'right',
					'label'     => Mage::helper('revslideshow')->__('Right'),
					)	   					   
				),
			));
		$solo_arrow_vright = $fieldset->addField('soloArrowRightValign', 'select', array(
			'label'     => Mage::helper('revslideshow')->__('Vertical Align of the Arrow Right'),
			'name'      => 'soloArrowRightValign',
			'note'		=> Mage::helper('revslideshow')->__('Vertical Align of the Arrow Right'),
			'values'    => array(
				array(
					'value'     => 'top',
					'label'     => Mage::helper('revslideshow')->__('Top'),
					),
				array(
					'value'     => 'center',
					'label'     => Mage::helper('revslideshow')->__('Center'),
					),
				array(
					'value'     => 'bottom',
					'label'     => Mage::helper('revslideshow')->__('Bottom'),
					)	   					   
				),
			));	

		$solo_arrow_offset_hright  = $fieldset->addField('soloArrowRightHOffset', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Arrow Right Offset Horizontal'),
			'name'      => 'soloArrowRightHOffset',
			'note'		=> Mage::helper('revslideshow')->__('The Offset position of arrow right depending on the aligned position'),
			))->setAfterElementHtml(' px');

		$solo_arrow_offset_vright = $fieldset->addField('soloArrowRightVOffset', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Arrow Right Offset Vertical'),
			'name'      => 'soloArrowRightVOffset',
			'note'		=> Mage::helper('revslideshow')->__('The Offset position of arrow right depending on the aligned position'),
			))->setAfterElementHtml(' px');		
		$this->setChild('form_after', $this->getLayout()->createBlock('adminhtml/widget_form_element_dependence')
			->addFieldMap($nav_type->getHtmlId(), $nav_type->getName())
			->addFieldMap($nav_style->getHtmlId(), $nav_style->getName())	
			->addFieldMap($nav_arrow->getHtmlId(), $nav_arrow->getName())	
			->addFieldMap($solo_arrow_hleft->getHtmlId(), $solo_arrow_hleft->getName())
			->addFieldMap($solo_arrow_vleft->getHtmlId(), $solo_arrow_vleft->getName())
			->addFieldMap($solo_arrow_offset_hleft->getHtmlId(), $solo_arrow_offset_hleft->getName())
			->addFieldMap($solo_arrow_offset_vleft->getHtmlId(), $solo_arrow_offset_vleft->getName())	
			->addFieldMap($solo_arrow_hright->getHtmlId(), $solo_arrow_hright->getName())
			->addFieldMap($solo_arrow_vright->getHtmlId(), $solo_arrow_vright->getName())
			->addFieldMap($solo_arrow_offset_hright->getHtmlId(), $solo_arrow_offset_hright->getName())
			->addFieldMap($solo_arrow_offset_vright->getHtmlId(), $solo_arrow_offset_vright->getName())	
			->addFieldDependence(
				$nav_style->getName(),
				$nav_type->getName(),
				'bullet'
				)
			->addFieldDependence(		                
				$solo_arrow_hleft->getName(),
				$nav_arrow->getName(),
				'solo'
				)
			->addFieldDependence(

				$solo_arrow_vleft->getName(),
				$nav_arrow->getName(),
				'solo'
				)
			->addFieldDependence(

				$solo_arrow_offset_hleft->getName(),
				$nav_arrow->getName(),
				'solo'
				)
			->addFieldDependence(

				$solo_arrow_offset_vleft->getName(),
				$nav_arrow->getName(),
				'solo'
				)
			->addFieldDependence(

				$solo_arrow_hright->getName(),
				$nav_arrow->getName(),
				'solo'
				)
			->addFieldDependence(

				$solo_arrow_vright->getName(),
				$nav_arrow->getName(),
				'solo'
				)
			->addFieldDependence(

				$solo_arrow_offset_hright->getName(),
				$nav_arrow->getName(),
				'solo'
				)
			->addFieldDependence(

				$solo_arrow_offset_vright->getName(),
				$nav_arrow->getName(),
				'solo'
				)



			);
	if (Mage::getSingleton("adminhtml/session")->getRevslideshowData())
	{
		$form->setValues(Mage::getSingleton("adminhtml/session")->getRevslideshowData());
		Mage::getSingleton("adminhtml/session")->setRevslideshowData(null);
	} 
	elseif(Mage::registry("revslideshow_data")) {
		$form->setValues(json_decode(Mage::registry("revslideshow_data")->getNavigation(),true));
	}
	return parent::_prepareForm();
	}
}
