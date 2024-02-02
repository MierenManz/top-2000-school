/// <reference lib="DOM" />

interface Item {
  name: string;
  artist: string;
  id: number;
}

interface SelectableItem extends Item {
  hidden: boolean;
}

declare const options: Map<number, SelectableItem>;
declare const selected: Map<number, SelectableItem>;

let selectedContainer: null | HTMLElement = null;
let optionsContainer: null | HTMLElement = null;

onload = () => {
  selectedContainer = document.getElementById("selected")!;
  optionsContainer = document.getElementById("options")!;
  render();
}

function createElement(item: Item, isSelected = false) {
  const eventHandler = isSelected ? "removeItem" : "selectItem";
  const icon = isSelected ? "X" : "+";
  return `
  <div class="item container row" id='${isSelected ? "s-" : ""}item-${item.id}'>
    <div class="col">
      <h5 id="name-${item.id}">${item.name}</h5>
      <p id="artist-${item.id}">${item.artist}</p>
    </div>
    <div class="col">
      <button type="button" class="btn" onclick="${eventHandler}(${item.id})">${icon}</button>
    </div>
  </div>`;
}


function renderSelected() {
  let renderString = "";

  for (const item of selected.values()) {
    renderString += createElement(item, true);
  }
  selectedContainer!.innerHTML = renderString;
}

function render() {
  let renderString = "";
  for (const item of options.values()) {
    if (item.hidden) continue;
    renderString += createElement(item);
  }
  optionsContainer!.innerHTML = renderString;
  renderSelected();
}

function selectItem(itemID: number) {
  const item = options.get(itemID)!;
  item.hidden = true;
  selected.set(itemID, item);
  document.getElementById("item-" + item.id)!
    .setAttribute("hidden", "");
  renderSelected();
}

// deno-lint-ignore no-explicit-any
(window as any).selectItem = selectItem;

function removeItem(itemID: number) {
  selected.delete(itemID);
  const item = options.get(itemID)!;
  item.hidden = false;
  document.getElementById("item-" + item.id)!
    .removeAttribute("hidden")
  renderSelected();
}

// deno-lint-ignore no-explicit-any
(window as any).removeItem = removeItem;
