document.addEventListener('keyup', e => {
    if (e.target.matches('#buscador')){
    
    document.querySelectorAll('.product-box').forEach(product => {
      product.textContent.toLowerCase().includes(e.target.value)
       ? product.classList.remove('filtro')
       : product.classList.add('filtro');

    
        
        
    })
    }


})