<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Weight[]|\Cake\Collection\CollectionInterface $weights
  */
  $this->set('title', 'Weights');
?><!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Weight'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->
<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
		<div class="portlet-title">
				
<div class="weights index large-9 medium-8 columns content">
  
	<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold "><?= __('Weights') ?></span>
				</div>
				<div class="portlet-body">
				<div class="table-responsive">
    <table class="table table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('units_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($weights as $weight): ?>
            <tr>
                <td><?= $this->Number->format($weight->id) ?></td>
                <td><?= $this->Number->format($weight->weight) ?></td>
                <td><?= $weight->has('unit') ? $this->Html->link($weight->unit->name, ['controller' => 'Units', 'action' => 'view', $weight->unit->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $weight->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $weight->id]) ?>
                    <?php /*  = $this->Form->postLink(__('Delete'), ['action' => 'delete', $weight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weight->id)])*/ ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	</div>
	</div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
    </div>
    </div>
    </div>
</div>
