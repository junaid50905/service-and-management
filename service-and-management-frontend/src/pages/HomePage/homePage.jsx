import React from "react";
import AllProducts from "../../components/Products/allProducts";
import Header from "../../components/TopNavs/Customer/header";
import Footer from "../../components/Footer/footer";

function HomePage() {
  return (
    <div className="bg-gray-100">
      <Header />

      {/* Hero Section */}
      <section className="py-16 text-white bg-gray-900">
        <div className="container mx-auto text-center">
          <h1 className="mb-4 text-4xl font-semibold">
            Welcome to Your Online Store
          </h1>
          <p className="mb-8 text-lg">
            Discover amazing products at great prices.
          </p>
          <a
            href="/shop"
            className="px-6 py-2 text-lg text-white bg-blue-500 rounded-full hover:bg-blue-600"
          >
            Shop Now
          </a>
        </div>
      </section>

      {/* Featured Products */}
      <section className="py-12">
        <div className="container mx-auto">
          <h2 className="mb-6 text-3xl font-semibold text-gray-800">
            Featured Products
          </h2>
          <div className="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <AllProducts />
          </div>
        </div>
      </section>

      {/* Footer */}
      <Footer />
    </div>
  );
}

export default HomePage;
