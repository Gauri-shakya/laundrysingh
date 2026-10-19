<section id="certificates" class="py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="text-green-600 font-bold uppercase tracking-[4px] text-sm block mb-4">Quality Assurance</span>
            <h2 class="text-4xl md:text-5xl font-black text-zinc-900 uppercase">
                Our <span class="text-green-600">Certificates</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto mt-4 leading-relaxed">
                We are proud to be recognized for our excellence and commitment to professional standards.
            </p>
        </div>

        <!-- Certificates Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            
            <!-- Certificate Card 1 -->
            <div class="group relative bg-slate-50 rounded-[30px] p-6 shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100 hover:border-green-200 overflow-hidden cursor-pointer" onclick="openCertificate('{{ asset('images/compliance.jpg') }}')">
                <!-- Background Decoration -->
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-green-100/30 rounded-full blur-3xl group-hover:bg-green-200/40 transition-colors duration-500"></div>
                
                <div class="relative z-10 flex flex-col h-full">
                    <!-- Image Container -->
                    <div class="aspect-[1/1.414] bg-white rounded-2xl overflow-hidden shadow-md border border-slate-200 mb-6 group-hover:scale-[1.01] transition-transform duration-500">
                        <img src="{{ asset('images/compliance.jpg') }}" alt="Compliance" class="w-full h-full object-cover">
                        <!-- Overlay for "View" hint -->
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="bg-white text-zinc-900 px-6 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform text-sm flex items-center gap-2">
                                <i class="fas fa-search-plus"></i> View Certificate
                            </span>
                        </div>
                    </div>

                    <div class="text-center">
                        <h3 class="text-xl font-black text-zinc-900 mb-2 uppercase tracking-tight">ISO 9001:2015 Certified</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Recognized globally for our quality management systems.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Certificate Card 2 -->
            <div class="group relative bg-slate-50 rounded-[30px] p-6 shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100 hover:border-green-200 overflow-hidden cursor-pointer" onclick="openCertificate('{{ asset('images/ecocare.jpg') }}')">
                <!-- Background Decoration -->
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-blue-100/30 rounded-full blur-3xl group-hover:bg-blue-200/40 transition-colors duration-500"></div>
                
                <div class="relative z-10 flex flex-col h-full">
                    <!-- Image Container -->
                    <div class="aspect-[1/1.414] bg-white rounded-2xl overflow-hidden shadow-md border border-slate-200 mb-6 group-hover:scale-[1.01] transition-transform duration-500">
                        <img src="{{ asset('images/ecocare.jpg') }}" alt="EcoCare" class="w-full h-full object-cover">
                        <!-- Overlay for "View" hint -->
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="bg-white text-zinc-900 px-6 py-2 rounded-full font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform text-sm flex items-center gap-2">
                                <i class="fas fa-search-plus"></i> View Certificate
                            </span>
                        </div>
                    </div>

                    <div class="text-center">
                        <h3 class="text-xl font-black text-zinc-900 mb-2 uppercase tracking-tight">National Excellence Award</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Awarded for our eco-friendly laundry solutions.
                        </p>
                    </div>
                </div>
            </div>

        </div>
        
        @include('partials.cta')
    </div>

    <!-- Certificate Modal -->
    <div id="certModal" class="fixed inset-0 z-[999] hidden bg-black/90 flex items-center justify-center p-4 md:p-8">
        <button onclick="closeCertificate()" class="absolute top-6 right-6 text-white text-4xl hover:text-green-500 transition-colors z-[1000]">
            <i class="fas fa-times"></i>
        </button>
        <div class="max-w-4xl w-full h-full flex items-center justify-center" onclick="closeCertificate()">
            <img id="modalImg" src="" alt="Certificate Full View" class="max-w-full max-h-full object-contain rounded-lg shadow-2xl transition-all duration-300 transform scale-95" onclick="event.stopPropagation()">
        </div>
    </div>
</section>

<script>
function openCertificate(imgSrc) {
    const modal = document.getElementById('certModal');
    const modalImg = document.getElementById('modalImg');
    modalImg.src = imgSrc;
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Disable scroll
    setTimeout(() => {
        modalImg.classList.remove('scale-95');
        modalImg.classList.add('scale-100');
    }, 10);
}

function closeCertificate() {
    const modal = document.getElementById('certModal');
    const modalImg = document.getElementById('modalImg');
    modalImg.classList.add('scale-95');
    modalImg.classList.remove('scale-100');
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = ''; // Enable scroll
    }, 200);
}

// Close on escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeCertificate();
});
</script>