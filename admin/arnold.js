const tbody = document.querySelector(‘tbody’)
let selected = [];

tbody.addEventListener('change', event => {
  if (event.target.type === 'checkbox') {
    const checked = document.querySelectorAll('input[type="checkbox"]:checked')

    selected = Array.from(checked).map(x => x.value)
  }
})