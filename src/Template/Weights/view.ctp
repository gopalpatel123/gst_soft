<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Weight $weight
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Weight'), ['action' => 'edit', $weight->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Weight'), ['action' => 'delete', $weight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weight->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Weights'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weight'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="weights view large-9 medium-8 columns content">
    <h3><?= h($weight->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Unit') ?></th>
            <td><?= $weight->has('unit') ? $this->Html->link($weight->unit->name, ['controller' => 'Units', 'action' => 'view', $weight->unit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($weight->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight') ?></th>
            <td><?= $this->Number->format($weight->weight) ?></td>
        </tr>
    </table>
</div>
