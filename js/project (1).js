// script.js

// Function to fetch and display results
function fetchResults(location, price) {
    // Simulating fetching data from a server
    // You can replace this with your actual API call
    // For simplicity, we are using a dummy data array here
    const data = [
      { name: 'Luxury Villa', location: 'Paris', price: '$$$$', image: 'villa.jpg' },
      { name: 'Beach House', location: 'Maldives', price: '$$$', image: 'beach.jpg' },
      { name: 'Cozy Cabin', location: 'Canada', price: '$$', image: 'cabin.jpg' },
    ];
  
    const resultsContainer = document.getElementById('results');
    resultsContainer.innerHTML = '';
  
    // Filter data based on location and price range
    const filteredData = data.filter(item => {
      const locationMatch = location ? item.location.toLowerCase().includes(location.toLowerCase()) : true;
      const priceMatch = price ? item.price === price : true;
      return locationMatch && priceMatch;
    });
  
    if (filteredData.length > 0) {
      filteredData.forEach(item => {
        const listingCard = document.createElement('div');
        listingCard.className = 'listing-card';
        listingCard.innerHTML = `
          <img src="${item.image}" alt="${item.name}">
          <h3>${item.name}</h3>
          <p>Location: ${item.location}</p>
          <span class="price">${item.price}</span>
        `;
        resultsContainer.appendChild(listingCard);
      });
    } else {
      const noResults = document.createElement('p');
      noResults.textContent = 'No results found.';
      resultsContainer.appendChild(noResults);
    }
  }
  
  // Event listener for filter button click
  document.getElementById('filterBtn').addEventListener('click', function() {
    const locationInput = document.getElementById('location');
    const priceInput = document.getElementById('price');
    const location = locationInput.value;
    const price = priceInput.value;
    fetchResults(location, price);
  });
  
  // Initial fetch on page load
  fetchResults('', '');
  