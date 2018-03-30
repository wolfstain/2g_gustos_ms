class Subcategory < ApplicationRecord
  belongs_to :category
  has_many :pleasures
  validates :name, presence: true,
                   length: { minimum: 4, maximum: 50}
  validates :description, presence: true,
  length: { minimum: 4, maximum: 150 }
  validates_associated :category
end
