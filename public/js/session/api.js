import { request } from "../index.js";

export const createSession  = (formData) => request(
    '/api/sessions/store', { method: 'POST', body: formData }
)