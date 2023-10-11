import React, { useState, useEffect } from "react";
import { AiOutlineHeart } from "react-icons/ai";

import { AiOutlineShoppingCart } from "react-icons/ai";

import { AiOutlineShopping } from "react-icons/ai";

import axios from "axios";

const AllProducts = () => {
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
    <>
      {products.map((product) => (
        <div
          key={product.id}
          className="z-10 flex flex-col justify-between transition duration-300 transform bg-white shadow-lg rounded-xl hover:scale-103 hover:shadow-xl hover:border-gray-400 shadow-[#00000060] hover:shadow-[#0000006e]"
        >
          <div>
            <img
              src="https://i.postimg.cc/qRhp9vyG/essential-motorcycle-accessories.jpg"
              alt={product.id}
              className="object-cover w-full h-48 rounded-t-lg"
            />
            <div className="p-4">
              <h3 className="mb-2 font-semibold text-gray-800">
                {product.name}
              </h3>
              <p className="mb-2 text-gray-800">
                <span className="font-bold">Model: </span>
                {product.model}
              </p>
              <div className="flex justify-between">
                <div>
                  <p className="text-gray-800 ">
                    Warranty: {product.time_of_warranty} Months
                  </p>
                </div>
                <div>
                  <p className="text-xl font-bold text-red-500 mt-[-4px]">
                    ৳ {product.price}
                  </p>
                </div>
              </div>
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
          <div className="text-white rounded-b-xl">
            <button className="w-1/2 h-full bg-[#266cd4] hover:bg-[#2654d4] rounded-bl-lg">
              <div className="flex justify-center gap-1">
                <AiOutlineShopping className="w-5 h-5" />
                Buy Now
              </div>
            </button>
            <button className="w-1/2 h-full bg-[#F57224] hover:bg-[#f55f24] rounded-br-lg py-4">
              <div className="flex justify-center gap-1">
                <AiOutlineShoppingCart className="w-5 h-5" />
                Add to Cart
              </div>
            </button>
          </div>
          <div className="absolute bg-[#eeeeee] rounded-full right-3 top-3 p-1 cursor-pointer">
            <AiOutlineHeart className="w-5 h-5" />
          </div>
        </div>
      ))}
    </>
  );
};

export default AllProducts;
