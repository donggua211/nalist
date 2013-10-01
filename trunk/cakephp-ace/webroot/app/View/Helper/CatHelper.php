<?Php

/* /app/View/Helper/CatHelper.php */
App::uses('AppHelper', 'View/Helper');

class CatHelper extends AppHelper {
	public $helpers = array('Html', 'Form');
	
    public function listDocCats($docCats, $docCatsTree) {
        
		foreach ($docCats as $docCat) {
			echo '<tr>
				<td>'.($docCat['DocCat']['parent_id'] > 0 ? '└' : '').h($docCatsTree[$docCat['DocCat']['id']]).'&nbsp;</td>
				<td>'.h($docCat['DocCat']['description']).'&nbsp;</td>
				<td>'.h($docCat['DocCat']['created']).'&nbsp;</td>
				<td>'.h($docCat['DocCat']['modified']).'&nbsp;</td>
				<td class="actions">
					'.$this->Html->link(__('View'), array('action' => 'view', $docCat['DocCat']['id'])).'
					'.$this->Html->link(__('Edit'), array('action' => 'edit', $docCat['DocCat']['id'])).'
					'.$this->Form->postLink(__('Delete'), array('action' => 'delete', $docCat['DocCat']['id']), null, __('Are you sure you want to delete # %s?', $docCat['DocCat']['id'])).'
				</td>
			</tr>';
			
			if(isset($docCat['children']) && !empty($docCat['children'])) {
				$this->level ++;
				$this->listDocCats($docCat['children'], $docCatsTree);
			}
		}
    }
	
    public function listFeatureCats($featureCats, $featureCatsTree) {
        
		foreach ($featureCats as $featureCat) {
			echo '<tr>
				<td>'.($featureCat['FeatureCat']['parent_id'] > 0 ? '└' : '').h($featureCatsTree[$featureCat['FeatureCat']['id']]).'&nbsp;</td>
				<td>'.h($featureCat['FeatureCat']['description']).'&nbsp;</td>
				<td>'.h($featureCat['FeatureCat']['created']).'&nbsp;</td>
				<td>'.h($featureCat['FeatureCat']['modified']).'&nbsp;</td>
				<td class="actions">
					'.$this->Html->link(__('View'), array('action' => 'view', $featureCat['FeatureCat']['id'])).'
					'.$this->Html->link(__('Edit'), array('action' => 'edit', $featureCat['FeatureCat']['id'])).'
					'.$this->Form->postLink(__('Delete'), array('action' => 'delete', $featureCat['FeatureCat']['id']), null, __('Are you sure you want to delete # %s?', $featureCat['FeatureCat']['id'])).'
				</td>
			</tr>';
			
			if(isset($featureCat['children']) && !empty($featureCat['children'])) {
				$this->level ++;
				$this->listfeatureCats($featureCat['children'], $featureCatsTree);
			}
		}
    }
}