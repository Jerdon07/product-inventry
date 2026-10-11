import { createProduct, getProducts } from "./api.js"
import { addProductToList, clearErrors, renderProducts, showErrors } from "./render.js"

/* Instantiate Elements */
const dialog = document.getElementById('productDialog')
const openBtn = document.getElementById('openDialogBtn')
const closeBtn = document.getElementById('closeDialogBtn')
const form = document.getElementById('productForm')

// GET all products -------------------------------------
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

// POST a product ---------------------------------------

/* Instantiate Event Listeners */
openBtn.addEventListener('click', () => dialog.showModal())
closeBtn.addEventListener('click', () => dialog.close())

dialog.addEventListener('close', () => {
    form.reset()
    clearErrors()
})

/* Form Submission */
form.addEventListener('submit', async (event) => {
    event.preventDefault()
    clearErrors()

    try {
        const { ok, result } = await createProduct(new FormData(form))

        if (!ok) {
            showErrors(result.errors)
            return
        }

        addProductToList(result.product)
        dialog.close() // the 'close' listener resets the form
    } catch (error) {
        console.error('Submission failed:', error)
        showErrors({ form: 'Something went wrong. Please try again.' })
    }
})