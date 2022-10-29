document.addEventListener('DOMContentLoaded', initDocMovProd)


function initDocMovProd() {

    let datatable = document.querySelector('.productmovementproducts tbody');

    let form = document.forms[0];



    datatable.addEventListener('click', function (e) {
        let target = e.target.parentNode;
        let root_tr = target.closest('TR');

        let name = root_tr.cells[1].innerText;
     //   console.log(name);
        form.querySelector('.formname').innerText = name;
        form.product_id.value = root_tr.cells[0].innerText;
        document.querySelector("#nav-tab .product").click();

        // form.price.value = root_tr.cells[2].innerText;
        // form.querySelector('.formprice').innerText = form.price.value;

        

    });

}
