<script data-turbolinks-eval="false">
    window.TurbolinksForm = @json(config('turbolinks-form'));

    if (window.Turbolinks && TurbolinksForm.enabled) {
        document.addEventListener('turbolinks:load', function() {
            let turbolinksFormEls = document.querySelectorAll(TurbolinksForm.selector);
            
            if (turbolinksFormEls.length) {
                turbolinksFormEls.forEach(function (turbolinksFormEl) {
                    turbolinksFormEl.onsubmit = function (event) {
                        event.preventDefault();
                        let form = event.target;
                        let formData = new FormData(form);

                        let submittedClass = 'turbolinks-form-submitted';
                        if (form.classList.contains(submittedClass)) {
                            return;
                        } else {
                            form.classList.add(submittedClass);
                        }

                        Turbolinks.controller.adapter.progressBar.setValue(0);
                        Turbolinks.controller.adapter.progressBar.show();

                        fetch(form.getAttribute('action'), {
                            method: form.getAttribute('method'),
                            headers: {
                                'x-requested-with': 'XMLHttpRequest',
                                'turbolinks-form': true
                            },
                            body: formData
                        })
                        .then(response => {
                            if (response.headers.get('turbolinks-form-validated')) {
                                response.text().then(function (text) {
                                    Turbolinks.clearCache();
                                    Turbolinks.visit(text);
                                });
                            }
                        })
                        .catch(error => {
                            console.error(error)
                        })
                        .finally(() => {
                            form.classList.remove(submittedClass);
                            Turbolinks.controller.adapter.progressBar.setValue(100);
                            Turbolinks.controller.adapter.progressBar.hide();
                        });
                    };
                });
            }
        });
    }
</script>