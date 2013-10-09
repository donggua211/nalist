<?Php

/* /app/View/Helper/CatHelper.php */
App::uses('AppHelper', 'View/Helper');

class CatHelper extends AppHelper {
	public $helpers = array('Html', 'Form');
	
    public function listDocCats($docCats) {
        
		foreach ($docCats as $docCat) {
			echo '<tr>
				<td class="content">';
			
			for($i = 1; $i < $docCat['DocCat']['depth']; $i ++) {
				echo '&nbsp;&nbsp;&nbsp;&nbsp;';
			}
			if($docCat['DocCat']['depth'] > 1) {
				echo '---->';
			}
			
			echo $this->Html->link(h($docCat['DocCat']['name']), array('controller' => 'doc_cats', 'action' => 'view', $docCat['DocCat']['id'])).'</td>
				<td class="message">'.h($docCat['DocCat']['description']).'&nbsp;</td>
			</tr>';
			
			if(isset($docCat['children']) && !empty($docCat['children'])) {
				$this->listDocCats($docCat['children']);
			}
		}
    }
	
    public function listFeatureCats($featureCats) {
        
		foreach ($featureCats as $featureCat) {
			echo '<tr>
				<td class="content">';
			
			for($i = 1; $i < $featureCat['FeatureCat']['depth']; $i ++) {
				echo '&nbsp;&nbsp;&nbsp;&nbsp;';
			}
			if($featureCat['FeatureCat']['depth'] > 1) {
				echo '---->';
			}
			
			echo $this->Html->link(h($featureCat['FeatureCat']['name']), array('controller' => 'doc_cats', 'action' => 'view', $featureCat['FeatureCat']['id'])).'</td>
				<td class="message">'.h($featureCat['FeatureCat']['description']).'&nbsp;</td>
			</tr>';
			
			if(isset($featureCat['children']) && !empty($featureCat['children'])) {
				$this->listfeatureCats($featureCat['children']);
			}
		}
    }
}