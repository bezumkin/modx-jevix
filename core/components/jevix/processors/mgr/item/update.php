<?php
/**
 * Update an Item
 * 
 * @package jevix
 * @subpackage processors
 */
/* get board */
if (empty($scriptProperties['id'])) return $modx->error->failure($modx->lexicon('jevix.item_err_ns'));
$item = $modx->getObject('JevixItem',$scriptProperties['id']);
if (!$item) return $modx->error->failure($modx->lexicon('jevix.item_err_nf'));

$item->fromArray($scriptProperties);

if ($item->save() == false) {
    return $modx->error->failure($modx->lexicon('jevix.item_err_save'));
}

/* output */
$itemArray = $item->toArray('',true);
return $modx->error->success('',$itemArray);