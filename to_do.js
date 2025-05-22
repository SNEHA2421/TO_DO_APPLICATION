<script>
  document.addEventListener('DOMContentLoaded', () => {
    const inputBox = document.getElementById('inputBox');
    const addBtn = document.getElementById('add');
    const form = inputBox.closest('form');

    // Clear input after adding a task
    form.addEventListener('submit', (e) => {
      // Only clear if Add button is clicked
      if (document.activeElement === addBtn && inputBox.value.trim() !== '') {
        setTimeout(() => {
          inputBox.value = '';
          addBtn.disabled = true; // Disable add button after submit
        }, 10);
      }
    });

    // Disable Add button if input empty
    inputBox.addEventListener('input', () => {
      addBtn.disabled = inputBox.value.trim() === '';
    });

    // Initially disable Add button
    addBtn.disabled = true;

    // Confirm before delete
    const deleteButtons = document.querySelectorAll('button[name="deleted"]');
    deleteButtons.forEach(button => {
      button.addEventListener('click', (e) => {
        if(!confirm('Are you sure you want to delete this task?')) {
          e.preventDefault();
        }
      });
    });
  });
</script>
