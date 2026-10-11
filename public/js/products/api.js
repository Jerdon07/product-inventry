async function request(url, options = {}) {
    const response = await fetch (url, options)

    const result = await response.json()

    return {
        ok: response.ok,
        result,
    }
}

export const getProducts = () => request('/api/products')

export const createProduct = (formData) => request(
    '/api/products/create', { method: 'POST', body: formData }
)