class Category < ApplicationRecord
  has_many :subcategories
  validates :name, presence: true,
            length: { minimum: 4, maximum: 50}
  validates :description, presence: true,
            length: { minimum: 4, maximum: 150 }
end
