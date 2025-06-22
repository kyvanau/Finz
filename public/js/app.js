```javascript
// Modal functionality
function showOutcomeModal() {
    document.getElementById('outcomeModal').style.display = 'block';
}

function showTargetModal() {
    // Add target modal functionality
    alert('Target modal coming soon!');
}

// Close modal when clicking X
document.querySelectorAll('.close').forEach(closeBtn => {
    closeBtn.onclick = function() {
        this.closest('.modal').style.display = 'none';
    }
});

// Close modal when clicking outside
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
    }
}
```
