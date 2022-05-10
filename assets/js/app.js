// Variables de selector de tema
const theme = localStorage.getItem('theme')
const themeList = document.getElementById('themes')

// Variables generales
const priceRange = document.getElementById('price-range')
const toggleAccount = document.getElementById('toggle-account-form')
const toggleAddress = document.getElementById('toggle-address-form')
const toggleSpotify = document.getElementById('toggle-spotify')
const account = document.getElementById('account-form')
const address = document.getElementById('address-form')
const spotify = document.getElementById('spotify')

// Cargar tema si existe en localStorage
document.body.setAttribute('data-theme', theme)

// Cambiar tema cuando el usuario selecciona uno de la lista
themeList.childNodes.forEach((option) => {
  option.addEventListener('click', () => {
    option.id === 'system' ? document.body.removeAttribute('data-theme') : document.body.setAttribute('data-theme', option.id)
    localStorage.setItem('theme', option.id)
  })
})

if (priceRange) {
  priceRange.addEventListener('change', () => {
    window.location.href = "index?max=" + priceRange.value
  })
}

// Esconder y mostrar widget de Spotify
if (toggleSpotify) {
  toggleSpotify.addEventListener('click', () => {
    spotify.classList.toggle('d-none')
  })
}

// Esconder y mostrar formulario de actualización de cuenta
if (toggleAccount) {
  toggleAccount.addEventListener('click', () => {
    account.classList.toggle('d-none')
  })
}

// Esconder y mostrar formulario de agregar dirección
if (toggleAddress) {
  toggleAddress.addEventListener('click', () => {
    address.classList.toggle('d-none')
  })
}
