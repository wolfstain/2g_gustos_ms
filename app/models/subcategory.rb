class Subcategory < ApplicationRecord
  belongs_to :category
  has_many :pleasures
  validates :name, presence: true,
                   length: { minimum: 4, maximum: 50}
  validates :description, presence: true,
  length: { minimum: 4, maximum: 150 }
  validates_associated :category
  scope :by_category, -> (category_id){where(category_id: category_id)}
  scope :by_name, -> (name){where(["name LIKE :term", {:term => "%#{name}%"}]) }
end
