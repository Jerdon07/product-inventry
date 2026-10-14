import { request } from "../index.js"

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