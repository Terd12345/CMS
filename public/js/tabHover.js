document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('[data-tab-target]');
    const tabContents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active', 'text-slate-700', 'border-slate-500'));
            tab.classList.add('active', 'text-slate-700', 'border-slate-500');

            tabContents.forEach(tc => tc.classList.add('hidden'));
            document.querySelector(tab.dataset.tabTarget).classList.remove('hidden');
        });
    });

    // Set the first tab as active by default
    tabs[0].classList.add('active', 'text-slate-700', 'border-slate-500');
    tabContents[0].classList.remove('hidden');
});

function previewEditImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
        const output = document.getElementById('editProfilePreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
