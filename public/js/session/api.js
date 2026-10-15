import { request } from "../app.js";

export const createSession  = (formData) => request(
    '/api/sessions/store', { method: 'POST', body: formData }
)