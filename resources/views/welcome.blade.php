<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased text-gray-800">
   
    <nav class="fixed w-full bg-white shadow-lg z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-bold text-blue-600">TMS</div>
                <div class="hidden md:flex space-x-8">
                    <a href="#features" class="hover:text-blue-600">Features</a>
                    <a href="#benefits" class="hover:text-blue-600">Benefits</a>
                    <a href="#testimonials" class="hover:text-blue-600">Testimonials</a>
                </div>
                <a href="{{url('login')}}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 
                    transition duration-300">Get Started</a>
            </div>
        </div>
    </nav>

    
    <section class="pt-24 pb-12 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="container mx-auto px-4 text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Streamline Your Task Management</h1>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Boost productivity with our intuitive task management solution</p>
            <a href="{{url('register')}}" class="inline-block bg-green-500 text-white px-8 py-3 rounded-lg 
                hover:bg-green-600 transition duration-300">Start Free Trial</a>
        </div>
    </section>

 
    <section id="features" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Key Features</h2>
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
               
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                    <i class="fas fa-tasks text-2xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Task Management</h3>
                    <p class="text-gray-600">Create, assign, and track tasks efficiently</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition duration-300">
    <i class="fas fa-chart-line text-2xl text-blue-600 mb-4"></i>
    <h3 class="text-xl font-semibold mb-2">Progress Tracking</h3>
    <p class="text-gray-600">Monitor project progress with real-time updates and analytics</p>
</div>

<div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition duration-300">
    <i class="fas fa-calendar-alt text-2xl text-blue-600 mb-4"></i>
    <h3 class="text-xl font-semibold mb-2">Deadline Management</h3>
    <p class="text-gray-600">Set and track deadlines with automated reminders</p>
</div>
             
            </div>
        </div>
    </section>

<section id="testimonials" class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">What Our Users Say</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" 
                        class="w-12 h-12 rounded-full mr-3 object-cover">
                    <div>
                        <h4 class="font-semibold">John Smith</h4>
                        <p class="text-sm text-gray-500">Project Manager at TechCorp</p>
                    </div>
                </div>
                <p class="text-gray-600">"This platform has transformed how our team collaborates. Task management has never been this efficient!"</p>
            </div>

            <!-- Testimonial Card 2 -->
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User" 
                        class="w-12 h-12 rounded-full mr-3 object-cover">
                    <div>
                        <h4 class="font-semibold">Sarah Johnson</h4>
                        <p class="text-sm text-gray-500">Team Lead at InnovateCo</p>
                    </div>
                </div>
                <p class="text-gray-600">"The intuitive interface and powerful features have made project tracking a breeze. Highly recommended!"</p>
            </div>

          
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="User" 
                        class="w-12 h-12 rounded-full mr-3 object-cover">
                    <div>
                        <h4 class="font-semibold">Michael Chen</h4>
                        <p class="text-sm text-gray-500">Product Owner at StartupX</p>
                    </div>
                </div>
                <p class="text-gray-600">"The reporting features and analytics have given us invaluable insights into our team's performance."</p>
            </div>

            <!-- Testimonial Card 4 -->
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="User" 
                        class="w-12 h-12 rounded-full mr-3 object-cover">
                    <div>
                        <h4 class="font-semibold">Emily Davis</h4>
                        <p class="text-sm text-gray-500">Operations Manager at GlobalTech</p>
                    </div>
                </div>
                <p class="text-gray-600">"We've seen a 40% increase in productivity since implementing this task management system."</p>
            </div>

           
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/men/92.jpg" alt="User" 
                        class="w-12 h-12 rounded-full mr-3 object-cover">
                    <div>
                        <h4 class="font-semibold">David Wilson</h4>
                        <p class="text-sm text-gray-500">Scrum Master at AgileFlow</p>
                    </div>
                </div>
                <p class="text-gray-600">"The collaboration features have made remote work feel seamless and efficient."</p>
            </div>

         
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/women/56.jpg" alt="User" 
                        class="w-12 h-12 rounded-full mr-3 object-cover">
                    <div>
                        <h4 class="font-semibold">Lisa Thompson</h4>
                        <p class="text-sm text-gray-500">CEO at SmartSolutions</p>
                    </div>
                </div>
                <p class="text-gray-600">"This system has become an essential part of our daily operations. It's simply outstanding!"</p>
            </div>
        </div>
    </div>
</section>


  
    <section class="bg-blue-600 py-16">
        <div class="container mx-auto px-4 text-center text-white">
            <h2 class="text-3xl font-bold mb-6">Ready to Get Started?</h2>
            <p class="mb-8 max-w-2xl mx-auto">Join thousands of teams already using our platform</p>
            <a href="{{url('register')}}" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg 
                hover:bg-gray-100 transition duration-300">Start Free Trial</a>
        </div>
    </section>

 
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">TMS</h3>
                    <p class="text-gray-400">Simplifying task management for teams worldwide</p>
                </div>
             
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 Task Management System. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
