
/**
 * Generic function for requesting to the server
 */
async function request(url, options = {}) {
    const response = await fetch (url, options)

    const result = await response.json()

    return {
        ok: response.ok,
        result,
    }
}

/**
 * GET all products
 */
export const getProducts = () => request('/api/products')

/**
 * DELETE a product
 */
export function deleteProduct(id) {
    const body = new FormData()

    body.append('_method', 'DELETE')
    body.append('id', id)

    return request('/api/product', {
        method: 'POST',
        body,
    })
}

/**
 * POST a product
 */
export const createProduct = (formData) => request(
    '/api/products/create', { method: 'POST', body: formData }
)