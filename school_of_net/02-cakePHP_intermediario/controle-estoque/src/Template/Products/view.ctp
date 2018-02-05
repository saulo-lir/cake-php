<div class="row">
    <div class="col-md-2" id="actions-sidebar">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= __('Actions') ?></h3>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li><?= $this->Html->link(__('Edit {0}', ['Product']), ['action' => 'edit', $product->id]) ?> </li>
                <li><?= $this->Form->postLink(__('Delete {0}', ['Product']), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
                <li><?= $this->Html->link(__('List {0}', ['Products']), ['action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New {0}', ['Product']), ['action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List {0}', ['Stock']), ['controller' => 'Stock', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New {0}', ['Stock']), ['controller' => 'Stock', 'action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List {0}', ['Stock In']), ['controller' => 'StockIn', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New {0}', ['Stock In']), ['controller' => 'StockIn', 'action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List {0}', ['Stock Out']), ['controller' => 'StockOut', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New {0}', ['Stock Out']), ['controller' => 'StockOut', 'action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List {0}', ['Categories']), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New {0}', ['Category']), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
                    </ul>
        </div>
    </div>
    <div class="products col-lg-10 col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= h($product->title) ?></h3>
            </div>
            <div class="box-body">
                <table class="table table-striped table-hover">
                                                        <tr>
                        <th>Title</th>
                        <td><?= h($product->title) ?></td>
                    </tr>
                                                                                <tr>
                        <th>Id</th>
                        <td><?= $this->Number->format($product->id) ?></td>
                    </tr>
                                <tr>
                        <th>Price</th>
                        <td><?= $this->Number->format($product->price) ?></td>
                    </tr>
                                <tr>
                        <th>Cost</th>
                        <td><?= $this->Number->format($product->cost) ?></td>
                    </tr>
                                <tr>
                        <th>Status</th>
                        <td><?= $this->Number->format($product->status) ?></td>
                    </tr>
                                <tr>
                        <th>Alert Quantity</th>
                        <td><?= $this->Number->format($product->alert_quantity) ?></td>
                    </tr>
                                                                    <tr>
                        <th>Created</th>
                        <td><?= h($product->created) ?></tr>
                    </tr>
                                <tr>
                        <th>Modified</th>
                        <td><?= h($product->modified) ?></tr>
                    </tr>
                                                    </table>
                                        <div class="row">
                    <h4>Description</h4>
                    <?= $this->Text->autoParagraph(h($product->description)); ?>
                </div>
                                                    <div class="related">
                    <?php if (!empty($product->stock)): ?>
                    <h4><?= __('Related {0}', ['Stock']) ?></h4>
                    <table class="table table-striped table-hover">
                        <tr>
                                        <th>Id</th>
                                        <th>Product Id</th>
                                        <th>Decimal</th>
                                        <th>Unit Price</th>
                                        <th>Unit Cost</th>
                                        <th>Created</th>
                                        <th>Modified</th>
                                        <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->stock as $stock): ?>
                        <tr>
                            <td><?= h($stock->id) ?></td>
                            <td><?= h($stock->product_id) ?></td>
                            <td><?= h($stock->decimal) ?></td>
                            <td><?= h($stock->unit_price) ?></td>
                            <td><?= h($stock->unit_cost) ?></td>
                            <td><?= h($stock->created) ?></td>
                            <td><?= h($stock->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Stock', 'action' => 'view', $stock->id]) ?>

                                <?= $this->Html->link(__('Edit'), ['controller' => 'Stock', 'action' => 'edit', $stock->id]) ?>

                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stock', 'action' => 'delete', $stock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stock->id)]) ?>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                        <div class="related">
                    <?php if (!empty($product->stock_in)): ?>
                    <h4><?= __('Related {0}', ['Stock In']) ?></h4>
                    <table class="table table-striped table-hover">
                        <tr>
                                        <th>Id</th>
                                        <th>Product Id</th>
                                        <th>Quantity</th>
                                        <th>Created</th>
                                        <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->stock_in as $stockIn): ?>
                        <tr>
                            <td><?= h($stockIn->id) ?></td>
                            <td><?= h($stockIn->product_id) ?></td>
                            <td><?= h($stockIn->quantity) ?></td>
                            <td><?= h($stockIn->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'StockIn', 'action' => 'view', $stockIn->id]) ?>

                                <?= $this->Html->link(__('Edit'), ['controller' => 'StockIn', 'action' => 'edit', $stockIn->id]) ?>

                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StockIn', 'action' => 'delete', $stockIn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockIn->id)]) ?>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                        <div class="related">
                    <?php if (!empty($product->stock_out)): ?>
                    <h4><?= __('Related {0}', ['Stock Out']) ?></h4>
                    <table class="table table-striped table-hover">
                        <tr>
                                        <th>Id</th>
                                        <th>Product Id</th>
                                        <th>Quantity</th>
                                        <th>Created</th>
                                        <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->stock_out as $stockOut): ?>
                        <tr>
                            <td><?= h($stockOut->id) ?></td>
                            <td><?= h($stockOut->product_id) ?></td>
                            <td><?= h($stockOut->quantity) ?></td>
                            <td><?= h($stockOut->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'StockOut', 'action' => 'view', $stockOut->id]) ?>

                                <?= $this->Html->link(__('Edit'), ['controller' => 'StockOut', 'action' => 'edit', $stockOut->id]) ?>

                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StockOut', 'action' => 'delete', $stockOut->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockOut->id)]) ?>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                        <div class="related">
                    <?php if (!empty($product->categories)): ?>
                    <h4><?= __('Related {0}', ['Categories']) ?></h4>
                    <table class="table table-striped table-hover">
                        <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Url</th>
                                        <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->categories as $categories): ?>
                        <tr>
                            <td><?= h($categories->id) ?></td>
                            <td><?= h($categories->title) ?></td>
                            <td><?= h($categories->url) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Categories', 'action' => 'view', $categories->id]) ?>

                                <?= $this->Html->link(__('Edit'), ['controller' => 'Categories', 'action' => 'edit', $categories->id]) ?>

                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categories', 'action' => 'delete', $categories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categories->id)]) ?>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                </div>
    </div>
</div>
