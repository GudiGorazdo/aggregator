export const BeforeShopListUpdate = new CustomEvent('BeforeShopListUpdate', {
  detail: {},
  bubbles: true,
  cancelable: true,
});

export const ShopListUpdate = new CustomEvent('ShopListUpdate', {
  detail: {},
  bubbles: true,
  cancelable: true,
});

export const FilterFullReset = new CustomEvent('filterFullReset', {
  detail: {},
  bubbles: true,
  cancelable: true,
});

export const SetActiveShopListItem = new CustomEvent('SetActiveShopListItem', {
  detail: {},
  bubbles: true,
  cancelable: true,
});
