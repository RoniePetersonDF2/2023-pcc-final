document.addEventListener("click", e=>{
const IsDropdownbutton = e.target.matches("[data-dropdown-button]")
if (!IsDropdownbutton && e.target.closest('[data-dropdown]') != null) return

let currentDropdown
if (IsDropdownbutton){
    currentDropdown = e.target.closest('[data-dropdown]')
    currentDropdown.classList.toggle('active')
}
 
document.querySelector("[data-dropdown].active").forEach(dropdown => {
    if (dropdown === currentDropdown) return
    dropdown.classList.remove('active')

})
})
