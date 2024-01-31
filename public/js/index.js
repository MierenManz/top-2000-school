// deno-fmt-ignore-file
// deno-lint-ignore-file
// This code was bundled using `deno bundle` and it's not recommended to edit it manually

let selectedContainer = null;
let optionsContainer = null;
onload = ()=> {
    selectedContainer = document.getElementById("selected");
    optionsContainer = document.getElementById("options");
    render();
};
function createElement(item, isSelected = false) {
    const eventHandler = isSelected ? "removeItem" : "selectItem";
    const icon = isSelected ? "X" : "+";
    return `
  <div class="my-1 w-fit mx-auto container row border rounded" id='${isSelected ? "s-" : ""}item-${item.id}'>
    <div class="col-6">
      <h5 id="name-${item.id}">${item.name}</h5>
      <p id="artist-${item.id}">${item.artist}</p>
    </div>
    <div class="col-1 my-auto">
      <button type="button" class="btn" onclick="${eventHandler}(${item.id})">${icon}</button>
    </div>
  </div>`;
}
function renderSelected() {
    let renderString = "";
    for (const item of selected.values()){
        renderString += createElement(item, true);
    }
    selectedContainer.innerHTML = renderString;
}
function render() {
    let renderString = "";
    for (const item of options.values()){
        if (item.hidden) continue;
        renderString += createElement(item);
    }
    optionsContainer.innerHTML = renderString;
    renderSelected();
}
function selectItem(itemID) {
    const item = options.get(itemID);
    item.hidden = true;
    selected.set(itemID, item);
    document.getElementById("item-" + item.id).setAttribute("hidden", "");
    renderSelected();
}
window.selectItem = selectItem;
function removeItem(itemID) {
    selected.delete(itemID);
    const item = options.get(itemID);
    item.hidden = false;
    document.getElementById("item-" + item.id).removeAttribute("hidden");
    renderSelected();
}
window.removeItem = removeItem;
