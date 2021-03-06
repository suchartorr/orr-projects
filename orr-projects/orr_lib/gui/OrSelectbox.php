<?php
//
//OrDbForm.php - Copyright 
//@author Suchart Bunhachirat
//@version php5-2550
//************************************************************************
//
//class OrSelectbox

class OrSelectbox extends OrControls {
  //
  //
  //@return 
  //@access public
  
  public $use_ajax =  false;

  function __construct($id, $name = null, $idx = null) {
        parent::__construct($id, $name, $idx);
        //$this->OrControls($id, $name, $idx);
        $this->property('option', 'array');
        $this->OP_[db_type]->set('text');
    }

  //
  //
  //@param mix value ค่าที่กำหนด
  //@return mix
  //@access public
  
  function get_tag($value = null)
  {
		if($value != null)
		{
			$this->OP_[value]->set($value);
		}
		if($this->OP_[auto_post]->get())
		{
			debug_mode(__FILE__ , __LINE__ , $this->OP_[auto_post]->get() , $this->OP_[id]->get() . ' : auto_post');
			$this->auto_post();
		}
		
		$id = $this->get_id_tag();
		$value = $this->OP_[value]->get();
		$has_in_list=false;
		
		if($value == null AND !is_numeric($value))
		{
			$value = $this->OP_[post_value]->get();
			debug_mode(__FILE__ , __LINE__ , $value , $this->OP_[id]->get() . ' : Value');
		}
		
		if($value == null )
		{
			$value = $this->OP_[default_value]->get();
		}
		if($this->OP_[class_name]->get() == null)
		{
			$class = null;
		}else{
			$class = 'class="'.$this->OP_[class_name]->get().'"';
		}
		$title = 'title="' . $this->OP_[title]->get() . '"';
		if($this->use_ajax){
			$tag="<select dojoType=\"combobox\" $id $class $title>\n";
		}else{
			$tag="<select $id $class $title>\n";
		}
		
		foreach($this->OP_[option]->get() as $key=>$val){
			$selected="";
			if($value == $val)
			{
				$selected='selected="selected"';
				$has_in_list=true;
			}
		
		$tag.='		<option value="'.$val.'" '.$selected.'>'.$key.'</option>'."\n";
		}
		
		if(!$has_in_list)
		{
			$selected='selected="selected"';
			$val_error="#$value#";
			$tag.='		<option value="'.$value.'" '.$selected.'>'.$val_error.'</option>'."\n";
		}
		
		return $tag.="</select>\n".$this->get_properties_tag();
  }

}


?>
