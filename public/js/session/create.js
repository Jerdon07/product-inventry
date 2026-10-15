import { clearErrors, showErrors } from "../index.js"
import { createSession } from "./api.js"

// Instantiate the elements
const form = document.getElementById('loginForm')

// handle click events
form.addEventListener('submit', async (event) => {
    event.preventDefault()
    clearErrors()

    try{
        const { ok, result } = await createSession(new FormData(form))
        
        if (!ok) {
            showErrors(result.errors)
            return
        }

        if (typeof result.redirect === 'string') {
            window.location.href = result.redirect
            return
        }

        throw new Error('Login succeeded without a redirect URL.')

    } catch (error) {
        console.error(error)
    }
})

// fetch api data
// render error