async function request(uri) {
    const response = await fetch (uri)

    const result = await response.json()

    return {
        ok: response.ok,
        result,
    }
}

export const getProducts = () => request('/api/products')