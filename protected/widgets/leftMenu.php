
<?php

//goi cac ham trong models->Category

class leftMenu extends CWidget{
    public function init() {
       
    }
    public function run() {
       $parent = Category::getAllParent();//ham lay menu cap 1 //id_parent = 0
          foreach($parent as &$item){// lap de lay menu cap 2 //id_parent = id_category
            $item['subCat'] = Category::getAllCategoryBy($item['id_category']);
              foreach($item['subCat'] as &$subItem){// lay menu cap 3 //id_parent = id_category
                $subItem['Cat'] = Category::getAllCategoryBy($subItem['id_category']);
            }
            }
       
        $this->render("leftMenu",array('data'=>$parent));
    }
}