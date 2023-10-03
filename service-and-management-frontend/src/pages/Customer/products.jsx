import React, { useState, useEffect } from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";
import { AiOutlineHeart } from "react-icons/ai";

import axios from "axios";

const ProductsCustomer = () => {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    fetchProducts();
  }, []);

  const fetchProducts = async () => {
    try {
      const response = await axios.get("http://127.0.0.1:8000/api/v1/products");
      setProducts(response.data);
    } catch (error) {
      console.error("Error fetching products:", error);
    }
  };

  //   const handleAddToCart = (productId, quantity) => {
  //     addToCart(productId, quantity);
  //   };

  return (
    <div>
      <TopNav />
      <CustomerSideNav />
      <div className="mx-auto container-box">
        <div className="grid grid-cols-1 gap-16 sm:grid-cols-2 md:grid-cols-3">
          {products.map((product) => (
            <div
              key={product.id}
              className="z-10 flex flex-col justify-between transition duration-300 transform bg-white rounded-b-lg shadow-lg rounded-t-xl hover:scale-103 hover:shadow-xl hover:border-gray-400 shadow-[#00000060] hover:shadow-[#0000006e]"
            >
              <div>
                <img
                  src="https://i.postimg.cc/qRhp9vyG/essential-motorcycle-accessories.jpg"
                  alt={product.id}
                  className="object-cover w-full h-48 rounded-lg"
                />
                <div className="p-4">
                  <h3 className="mb-2 font-semibold text-gray-800">
                    {product.name}
                  </h3>
                  <p className="mb-2 text-gray-800">
                    <span className="font-bold">Model: </span>
                    {product.model}
                  </p>
                  <p className="mb-2 font-bold text-red-500">
                    {product.price} TK
                  </p>
                  <p className="mb-2 text-gray-800">
                    Warranty: {product.time_of_warranty} Months
                  </p>
                </div>
              </div>
              {/* <div className="flex items-center justify-between">
                <div className="flex flex-col">
                  <button
                    onClick={(event) => {
                      const quantityInput =
                        event.target.parentElement.parentElement.querySelector(
                          `#quantity-${product.ProductId}`
                        );
                      const quantity = parseInt(quantityInput.value, 10);
                      handleAddToCart(product.ProductId, quantity);
                    }}
                    className="px-4 py-2 mt-2 text-white bg-blue-500 rounded-md hover:bg-blue-600"
                  >
                    Add to Cart
                  </button>
                </div>
                <button
                  onClick={() => addToWishlist(product.ProductId)}
                  className="text-red-500 transition duration-300 transform hover:text-red-600 hover:scale-110"
                >
                  <FaHeart size={24} />
                </button>
              </div> */}
              <div className="text-white bg-black rounded-b-lg ">
                <button className="w-1/2 h-full p-4 bg-green-400">Add to Cart</button>
                <button className="w-1/2 h-full p-4 bg-blue-400">Buy Now</button>
              </div>
              <div className="absolute bg-[#eeeeee] rounded-full right-3 top-3 p-1">
                <AiOutlineHeart className="w-5 h-5" />
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default ProductsCustomer;
