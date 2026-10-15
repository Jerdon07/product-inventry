/**
 * Request to the server
 */
export async function request(uri, options = {}) {
    const response = await fetch(uri, options)

    const result = await response.json()

    return {
        ok: response.ok,
        result,
    }
}

/**
 * Get session user
 */
export async function getSessionUser() {
    try {
        const { result, ok } = await request('/api/sessions', {
            method: 'GET',
        })

        if (!ok) {
            throw new Error('Failed to fetch the session user')
        }

        return result.user
    } catch(error) {
        console.error(error)
    }

}

/**
 * Display the error
 */
export function showErrors(errors = {}) {
    for (const [field, message] of Object.entries(errors)) {
        const errorElement = document.getElementById(`error-${field}`)

        if (errorElement) {
            errorElement.textContent = message
            errorElement.style.display = 'inline'
        }
    }
}

/**
 * Remove all errors
 */
export function clearErrors() {
    document.querySelectorAll('[id^="error-"]')
        .forEach((element) => {
            element.textContent = ''
            element.style.display = 'none'
        })
}