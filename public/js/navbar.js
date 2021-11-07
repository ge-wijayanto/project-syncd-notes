document.addEventListener('DOMContentLoaded', () => {
  const auth = document.querySelector('.auth');
  const drawerButton = document.querySelector('button#drawer');

  drawerButton.addEventListener('click', (e) => {
    e.stopPropagation()
    auth.classList.toggle('open');
  })

  document.addEventListener('click', (e) => {
    e.stopPropagation();
    auth.classList.remove('open');
  })
})