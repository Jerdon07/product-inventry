import { request } from "./app.js";


try {
    const {ok, result} = await request('/api/sessions', {
        method: 'GET'
    })
    
    if (!ok) {
        throw new Error('Failed to fetch the session user')
    }

    const name = document.getElementById('name')

    if (typeof result.user === 'object') {
        name.textContent = result.user.name

        const button1 = document.getElementById('button-1')
        button1.setAttribute('href', '/products')
        button1.textContent = 'Go to my products'

        const button2 = document.getElementById('button-2')
        button2.setAttribute('href', 'https://github.com/Jerdon07/product-inventry')
        button2.textContent = 'GitHub Repo'
    }
} catch(error) {
    console.error(`Failed to fetch the session user: ${error}`)
}