const table = document.getElementById('myTable');
const tbody = table.querySelector('tbody');
const pagination = document.getElementById('pagination');
const data = [
    { id: 1, name: 'John', email: 'john@example.com' },
    { id: 2, name: 'Jane', email: 'jane@example.com' },
    { id: 3, name: 'Alice', email: 'alice@example.com' },
    { id: 4, name: 'Bob', email: 'bob@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 5, name: 'Charlie', email: 'charlie@example.com' },
    { id: 10, name: 'Charlie', email: 'charlie@example.com' },
    // Add more data as needed
];

const rowsPerPage = 5;
let currentPage = 1;

function displayData(page) {
    const startIndex = (page - 1) * rowsPerPage;
    const endIndex = startIndex + rowsPerPage;
    const paginatedData = data.slice(startIndex, endIndex);

    tbody.innerHTML = ''; // Clear previous rows

    paginatedData.forEach(item => {
        const row = `<tr>
            <td>${item.id}</td>
            <td>${item.name}</td>
            <td>${item.email}</td>
        </tr>`;
        tbody.insertAdjacentHTML('beforeend', row);
    });
}

function renderPagination() {
    const pageCount = Math.ceil(data.length / rowsPerPage);

    let buttons = '';
    for (let i = 1; i <= pageCount; i++) {
        if (i === currentPage) {
            buttons += `<button class="active" onclick="changePage(${i})">${i}</button>`;
        } else if (i === 1 || i === pageCount || (i >= currentPage - 1 && i <= currentPage + 1)) {
            buttons += `<button onclick="changePage(${i})">${i}</button>`;
        } else if (i === currentPage - 2 || i === currentPage + 2) {
            buttons += `<span>...</span>`;
        }
    }

    pagination.innerHTML = `
        <button onclick="prevPage()">&lt;</button>
        ${buttons}
        <button onclick="nextPage()">&gt;</button>
    `;
}

function changePage(page) {
    currentPage = page;
    displayData(currentPage);
    renderPagination();
}

function prevPage() {
    if (currentPage > 1) {
        currentPage--;
        displayData(currentPage);
        renderPagination();
    }
}

function nextPage() {
    const pageCount = Math.ceil(data.length / rowsPerPage);
    if (currentPage < pageCount) {
        currentPage++;
        displayData(currentPage);
        renderPagination();
    }
}

// Initial display
displayData(currentPage);
renderPagination();
