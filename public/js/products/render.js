const productList = document.getElementById('productList')

/**
 * Display the products
 */
export function renderProducts(products) {
    productList.replaceChildren(...products.map(buildRow))
}

/**
 * Append a product to the list
 */
export function addProductToList(product) {
    productList.append(buildRow(product))
}

/**
 * Create a product table row
 */
function buildRow(product) {
    const tableRow = document.createElement('tr')

    tableRow.append(
        createCell(product.name),
        createCell(product.price),
        createCell(product.quantity),
        createAction(product.id)
    )

    return tableRow
}

function createCell(text) {
    const cell = document.createElement('td')
    cell.textContent = text
    return cell
}

function createAction(id) {

    /* Show Action */
    const showLink = document.createElement('a')
    showLink.href = `/product?id=${id}`
    showLink.textContent = 'View'

    /* Delete Button */
    const deleteButton = document.createElement('button')
    deleteButton.type = 'button'
    deleteButton.textContent = 'Delete'
    deleteButton.dataset.id = id
    deleteButton.className = 'danger'

    /* Actions Wrapper/Group */
    const wrapper = document.createElement('div')
    wrapper.className = 'row-actions'
    wrapper.append(showLink, deleteButton)

    const actionCell = document.createElement('td')
    actionCell.append(wrapper)

    return actionCell
}