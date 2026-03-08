<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => 'The Best Solar Panels of 2025: A Comprehensive Review',
            'body' => 'We reviewed the top solar panels available in 2025. This guide covers efficiency, pricing, and features of the leading models on the market.',
            'category' => 'Reviews',
            'type' => 'blog',
            'price' => null,
            'slug' => Str::slug('The Best Solar Panels of 2025: A Comprehensive Review'),
            'meta_title' => 'Best Solar Panels of 2025',
            'meta_description' => 'A review of the best solar panels in 2025, comparing their features, price, and efficiency.',
            'meta_keywords' => 'solar panels, 2025, reviews, energy',
            'username' => 'admin',
            'user_id' => 55,
        ]);

        Post::create([
            'title' => 'Smart Thermostats: Best Options for Homeowners',
            'body' => 'We reviewed the best smart thermostats available, including their features, ease of use, and energy-saving capabilities.',
            'category' => 'Reviews',
            'type' => 'blog',
            'price' => null,
            'slug' => Str::slug('Smart Thermostats: Best Options for Homeowners'),
            'meta_title' => 'Best Smart Thermostats',
            'meta_description' => 'A comparison of the top smart thermostats to help homeowners save energy and improve comfort.',
            'meta_keywords' => 'smart thermostats, reviews, energy saving, home automation',
            'username' => 'admin',
            'user_id' => 55,
        ]);

        Post::create([
            'title' => 'Top 5 Solar Street Lights You Should Consider in 2025',
            'body' => 'Our review of the top solar street lights available this year. Learn about their features, pricing, and installation ease.',
            'category' => 'Reviews',
            'type' => 'blog',
            'price' => null,
            'slug' => Str::slug('Top 5 Solar Street Lights You Should Consider in 2025'),
            'meta_title' => 'Best Solar Street Lights of 2025',
            'meta_description' => 'A detailed review of the best solar street lights in 2025.',
            'meta_keywords' => 'solar street lights, reviews, 2025, energy solutions',
            'username' => 'admin',
            'user_id' => 55,
        ]);

        Post::create([
            'title' => 'High-Efficiency Solar Panel Kit for Homes',
            'body' => 'This solar panel kit offers high efficiency and is perfect for residential homes looking to reduce electricity costs. It includes everything you need for easy installation.',
            'category' => 'Renewable Energy',
            'type' => 'store',
            'price' => '100000',
            'slug' => Str::slug('High-Efficiency Solar Panel Kit for Homes'),
            'meta_title' => 'High-Efficiency Solar Panel Kit',
            'meta_description' => 'A high-efficiency solar panel kit designed for residential homes.',
            'meta_keywords' => 'solar panel kit, renewable energy, home solar system, efficiency',
            'username' => 'admin',
            'user_id' => 55,
        ]);

        Post::create([
            'title' => 'Portable Solar Power Bank: Charge Your Devices Anywhere',
            'body' => 'This portable solar power bank ensures that your devices are always charged, even when you’re outdoors. Ideal for camping, travel, or emergencies.',
            'category' => 'Smart Gadgets',
            'type' => 'store',
            'price' => '25000',
            'slug' => Str::slug('Portable Solar Power Bank: Charge Your Devices Anywhere'),
            'meta_title' => 'Portable Solar Power Bank',
            'meta_description' => 'Keep your devices charged on the go with this portable solar power bank.',
            'meta_keywords' => 'solar power bank, portable charger, solar gadgets, off-grid',
            'username' => 'admin',
            'user_id' => 55,
        ]);

        Post::create([
            'title' => 'Solar Street Lighting Kit for Commercial Spaces',
            'body' => 'Our commercial solar street lighting kit is the perfect solution for businesses and large spaces. It’s energy-efficient and eco-friendly.',
            'category' => 'Renewable Energy',
            'type' => 'store',
            'price' => '150000',
            'slug' => Str::slug('Solar Street Lighting Kit for Commercial Spaces'),
            'meta_title' => 'Solar Street Lighting Kit for Businesses',
            'meta_description' => 'An efficient and sustainable solar street lighting solution for commercial spaces.',
            'meta_keywords' => 'solar street lighting, commercial lighting, renewable energy, outdoor lighting',
            'username' => 'admin',
            'user_id' => 55,
        ]);

        Post::create([
            'title' => 'The Future of Solar Energy in Africa',
            'body' => 'Solar energy is transforming the energy landscape in Africa. With innovations and advancements, it is expected to play a major role in solving energy access issues.',
            'category' => 'Renewable Energy',
            'type' => 'blog',
            'price' => null,
            'slug' => Str::slug('The Future of Solar Energy in Africa'),
            'meta_title' => 'Future of Solar Energy in Africa',
            'meta_description' => 'A look at how solar energy is shaping the future of Africa.',
            'meta_keywords' => 'solar energy, Africa, renewable energy, future trends',
            'username' => 'admin',
            'user_id' => 55,
        ]);
    }
}
