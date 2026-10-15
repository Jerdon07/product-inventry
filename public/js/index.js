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
    }
} catch(error) {
    console.error(`Failed to fetch the session user: ${error}`)
}