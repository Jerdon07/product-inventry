const productList = document.getElementById('productList')

export function renderProducts(products) {
    productList.replaceChildren(...products.map(buildRow))
}

function buildRow(product) {
    const tableRow = document.createElement('tr')

    tableRow.append(
        createCell(product.name),
        createCell(product.price),
        createCell(product.quantity),
        createCell(product.id),
    )

    return tableRow
}

export function addProductToList(product) {
    productList.append(buildRow(product))
}

function createCell(text) {
    const cell = document.createElement('td')
    cell.textContent = text
    return cell
}