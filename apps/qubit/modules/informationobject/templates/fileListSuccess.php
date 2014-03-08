<div id="preview-message">
  <?php echo __('Print preview') ?>
  <?php echo link_to('Close', array($resource, 'module' => 'informationobject', 'action' => 'fileList')) ?>
</div>

<h1 class="label"><?php echo __('File list') ?></h1>

<?php $row = $startrow = 1; foreach ($results as $parent => $items): ?>

  <div class="resource-hierarchy no-print">
    <ul>
    <?php foreach ($items[0]['resource']->getAncestors()->orderBy('lft') as $ancestor): ?>
      <?php if (QubitInformationObject::ROOT_ID != intval($ancestor->id)): ?>
      <li><h3><?php echo QubitInformationObject::getStandardsBasedInstance($ancestor)->__toString() ?></h3></li>
      <?php endif; ?>
    <?php endforeach; ?>
    </ul>
  </div>

  <table>
    <thead>
      <tr>
        <th><?php echo __('Level of description') ?></th>
        <th><?php echo __('Reference code') ?></th>
        <th><?php echo __('Title') ?></th>
      </tr>
    </thead><tbody>
    <?php foreach ($items as $item): ?>
      <tr>
        <td><?php echo $item['lod'] ?></td>
        <td><?php echo $item['referenceCode'] ?></td>
        <td><?php echo $item['title'] ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>

  <div class="result-count">
    <?php echo __('Showing %1% results', array('%1%' => count($items))) ?>
  </div>
<?php endforeach; ?>
