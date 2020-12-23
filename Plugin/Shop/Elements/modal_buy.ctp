<div class="modal-body-2">
  [IF REDUCTIONAL_ITEMS]
    <div class="alert alert-info">
      {REDUCTIONAL_ITEMS_LIST}
    </div>
  [/IF REDUCTIONAL_ITEMS]

  <p><b>{LANG-SHOP__ITEM_NAME} :</b> {ITEM_NAME}</p>
  <p><b>{LANG-SHOP__ITEM_DESCRIPTION} :</b> {ITEM_DESCRIPTION}</p>
  [IF AFFICH_SERVER]
    <p><b>{LANG-SERVER__TITLE} :</b> {ITEM_SERVERS}</p>
  [/IF AFFICH_SERVER]
  <p><b>{LANG-SHOP__ITEM_PRICE} :</b> {ITEM_PRICE} {SITE_MONEY}</p>
  <p><input name="code" type="text" class="form-control" autocomplete="off" id="code-voucher" style="width:245px;" placeholder="{LANG-SHOP__BUY_VOUCHER_ASK}"></p>
    [IF MULTIPLE_BUY]
    <p><div class="col-5">
      <input type="text" value="1" name="quantity">
    </div></p>
  [/IF MULTIPLE_BUY]
</div>
</div>
<div class="modal-footer">

    <button class="btn disabled">{LANG-SHOP__ITEM_TOTAL} : <span id="total-price">{ITEM_PRICE}</span>  {SITE_MONEY}</button>


  [IF ADD_TO_CART]
    <button type="button" class="btn btn-default add-to-cart" data-item-id="{ITEM_ID}" id="btn-cart">{LANG-SHOP__BUY_ADD_TO_CART}</button>
  [/IF ADD_TO_CART]
  <button type="button" class="btn btn-primary buy-item" data-item-id="{ITEM_ID}" id="btn-buy">{LANG-SHOP__BUY}</button>

