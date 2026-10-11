import { getProducts } from "./api.js";
import { renderProducts } from "./render.js";

const productList = document.getElementById('productList');
const dialog = document.getElementById('productDialog');
const openBtn = document.getElementById('openDialogBtn');
const closeBtn = document.getElementById('closeDialogBtn');
const form = document.getElementById('productForm');

/* Fetch Product Request */
async function loadProducts() {
    try {
        const { ok, result } = await getProducts()

        if (!ok) {
            console.error(result.errors)
            return
        }

        renderProducts(result.products)
    } catch (error) {
        console.error('Could not load products:', error)
    }
}

loadProducts()

/* Create Product Request */

/* Dialog */
openBtn.addEventListener('click', () => dialog.showModal());
closeBtn.addEventListener('click', () => dialog.close());

dialog.addEventListener('close', () => {
    form.reset();
    clearErrors();
});

/* Form Submit */
form.addEventListener('submit', async (event) => {
    event.preventDefault(); // stop the page reload
    clearErrors();

    try {
        const response = await fetch(form.action, {
            method: form.method,
            body: new FormData(form),
        });
        const result = await response.json();

        if (!response.ok) {
            showErrors(result.errors);
            return;
        }

        addProductToList(result.product);
        dialog.close(); // the 'close' listener resets the form
    } catch (error) {
        console.error('Submission failed:', error);
        showErrors({ form: 'Something went wrong. Please try again.' });
    }
});

/**
 * Append the created item to the list
 * @param {name, price, quantity} product 
 */
function addProductToList(product) {

    /* Link Element */
    const tableRow = document.createElement('tr'); // Instantiate element
    tableRow.append(
        createCell(product.name),
        createCell(product.price),
        createCell(product.quantity),
    )

    const deleteCell = document.createElement('td')
    const deleteButton = document.createElement('button')

    deleteButton.type = 'button'
    deleteButton.textContent = 'Delete'
    deleteButton.dataset.id = product.id
    deleteCell.append(deleteButton)

    tableRow.append(deleteCell)
    productList.append(tableRow)
}

function createCell(text) {
    const cell = document.createElement('td')
    cell.textContent = text
    return cell
}

/**
 * Display the error to the user
 */
function showErrors(errors = {}) {
    for (const [field, message] of Object.entries(errors)) {
        const errorElement = document.getElementById(`error-${field}`);
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.classList.remove('hidden');
        }
    }
}

/**
 * Remove all errors
 */
function clearErrors() {
    document.querySelectorAll('[id^="error-"]').forEach((el) => {
        el.textContent = '';
        el.classList.add('hidden');
    });
}