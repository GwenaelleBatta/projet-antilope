console.log('test')


class Ecosphair_Controller {
    constructor() {
        //Ici le DOM n'est pas encore prêt
        //Pour le moment rien à faire
        this.body = document.body
    }

    run() {
        //Ici le DOM est prêt
        document.documentElement.classList.add('js-enabled');
        // FADE-IN
        let options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5,
        }

        let aTargets = document.querySelectorAll('.slide-in');
        let observer = new IntersectionObserver(callback, options);
        for (const target of aTargets) {
            observer.observe(target);
            target.addEventListener('load', (event) => {
            })
        }
        console.log(aTargets)

        function callback(entries, observer) {
            entries.forEach(entry => {
                // chaque élément de entries correspond à une variation
                // d'intersection pour un des éléments cible:
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        };
    }
}

window.ecosphair = new Ecosphair_Controller();
window.addEventListener('load', () => window.ecosphair.run())